<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recruitment\Company;

use Illuminate\Support\Facades\DB;

class DatabaseCompanies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('recruitments')->table('companies')->truncate();

        Company::create([
            "id" => 1,
            "name" => "MDG INTERMEDIACOES DE NEGOCIOS EIRELI",
            "cnpj" => "34.052.374/0001-72",
            "local" => "Paulínia",
        ]);

        Company::create([
            "id" => 2,
            "name" => "A.C.G. CONSULTORIA EM GESTAO EMPRESARIAL LTDA",
            "cnpj" => "28.093.975/0001-202",
            "local" => "Paulínia",
        ]);

        Company::create([
            "id" => 3,
            "name" => "GASPAR ASSESSORIA EMPRESARIAL LTDA",
            "cnpj" => "46.638.348/0001-00",
            "local" => "Cosmópolis",
        ]);
    }
}
