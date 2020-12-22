<?php

use Illuminate\Database\Seeder;

class MedicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medications')->truncate();

        $medication = [
            [
                'name' => 'Salbutamol',
                'type' => 'Luchtwegverwijders'
            ], 
            [
                'name' => 'Terbutaline',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Ipratropium',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Formoterol',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Indacaterol',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Salmeterol',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Olodaterol',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Tiotropium',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Glycopyrronium',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Aclidinium',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Umeclidinium',
                'type' => 'Luchtwegverwijders'
            ],
            [
                'name' => 'Beclomethason',
                'type' => 'Luchtwegbeschermers'
            ],
            [
                'name' => 'Budesonide',
                'type' => 'Luchtwegbeschermers'
            ],
            [
                'name' => 'Ciclesonide',
                'type' => 'Luchtwegbeschermers'
            ],
            [
                'name' => 'Fluticasonpropionaat',
                'type' => 'Luchtwegbeschermers'
            ],
            [
                'name' => 'Corticosteroid Neusspray',
                'type' => 'Neusspray'
            ],
        ];

        for ($i = 0; $i < count($medication); $i++) {
            DB::table('medications')->insert([
                'name' => $medication[$i]['name'],
                'type' => $medication[$i]['type'],
            ]);
        }
    }
}
