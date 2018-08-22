<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return '.\resources\stubs\Repository\repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * Replace the namespace for the given stub.
     *
     * @param  string $stub
     * @param  string $name
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {

        $stub = str_replace(
            ['RepositoryNamespace', 'ModelName'],
            [$this->getNamespace($name), $this->setModel()],
            $stub
        );

        return $this;
    }


    /**
     * set Model
     *
     */
    private function setModel()
    {
        if (!empty($this->option('model'))) {
            return $this->option('model');
        } else {
            $name = explode('/', $this->getNameInput('name'));
            return str_replace('Repository', '', $name[count($name) - 1]);
        }
    }


    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Injection  model.']
        ];
    }
}
