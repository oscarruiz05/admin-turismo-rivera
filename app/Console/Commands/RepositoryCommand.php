<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {modelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make repository';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $repositoryName = $this->argument('modelName');

        $dirRepositories = app_path('Repositories');
        if(!File::exists($dirRepositories)){
            File::makeDirectory($dirRepositories);
        }

        $repositoryFile = $dirRepositories.'/'.$repositoryName.'Repository.php';

        if(!File::exists($repositoryFile)){
            $repositoryContent = <<<EOT
            <?php

            namespace App\Repositories;

            use App\Models\\{$repositoryName};

            class {$repositoryName}Repository {

                protected \$model;

                public function __construct({$repositoryName} \$model)
                {
                    \$this->model = \$model;
                }

                public function index(\$paginate){
                    return \$this->model->paginate(\$paginate);
                }

                public function create(\$attributes){
                    return \$this->model->create(\$attributes);
                }
            }
            EOT;

            File::put($repositoryFile, $repositoryContent);
            $this->info("Repositorio {$repositoryName}Repository creado con exito");
        }else{
            $this->info("Error creando el {$repositoryName}Repository");
        }

        $createdService = $this->confirm('Desea crear el servicio?');

        if($createdService){
            $dirServices = app_path('Services');
            if(!File::exists($dirServices)){
                File::makeDirectory($dirServices);
            }

            $fileService = $dirServices.'/'.$repositoryName.'Service.php';
            if(!File::exists($fileService)){
                $serviceContent = <<<EOT
                <?php

                namespace App\Services;

                use App\Repositories\\{$repositoryName}Repository;

                class {$repositoryName}Service {

                    private \${$repositoryName}Repository;

                    public function __construct(
                        {$repositoryName}Repository \${$repositoryName}Repository
                    ){
                        \$this->{$repositoryName}Repository = \${$repositoryName}Repository;
                    }

                    /* your code here */
                }
                EOT;
                File::put($fileService, $serviceContent);
                $this->info("Servicio {$repositoryName}Service creado con exito");
            }else{
                $this->info("Error creando el {$repositoryName}Service");
            }
        }

        return Command::SUCCESS;

    }
}
