<?php

namespace Beyondcode\TinkerTool\Http\Controllers;

use Psy\Shell;
use Psy\Configuration;
use Illuminate\Http\Request;
use Psy\ExecutionLoopClosure;
use Laravel\Tinker\ClassAliasAutoloader;
use Symfony\Component\Console\Output\BufferedOutput;

class TinkerController
{

    public function tinker(Request $request)
    {
        $config = new Configuration([
            'updateCheck' => 'never'
        ]);

        $config->getPresenter()->addCasters(
            $this->getCasters()
        );

        $out = new BufferedOutput();

        $shell = new Shell($config);
        $shell->setOutput($out);

        $path = app()->basePath('vendor/composer/autoload_classmap.php');

        if (file_exists($path)) {
            $loader = ClassAliasAutoloader::register($shell, $path);
        }

        $shell->addInput($request->get('code'));

        /*
         * Manually trigger execution loop.
         */
        $closure = new ExecutionLoopClosure($shell);
        $closure->execute();

        return $this->cleanOutput($out->fetch());
    }

    protected function cleanOutput(string $output): string
    {
        $output = preg_replace('/<aside>(.*)?<\/aside>(.*)Exit:  Ctrl\+D/ms', '$2', $output);

        return trim($output);
    }

    /**
     * Get an array of Laravel tailored casters.
     *
     * @return array
     */
    protected function getCasters()
    {
        $casters = [
            'Illuminate\Support\Collection' => 'Laravel\Tinker\TinkerCaster::castCollection',
        ];

        if (class_exists('Illuminate\Database\Eloquent\Model')) {
            $casters['Illuminate\Database\Eloquent\Model'] = 'Laravel\Tinker\TinkerCaster::castModel';
        }

        if (class_exists('Illuminate\Foundation\Application')) {
            $casters['Illuminate\Foundation\Application'] = 'Laravel\Tinker\TinkerCaster::castApplication';
        }

        return $casters;
    }

}