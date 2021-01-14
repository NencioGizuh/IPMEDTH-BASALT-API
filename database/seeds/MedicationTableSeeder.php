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
        DB::table('medications')->delete();

        $medication = [
            [
                'name' => 'Salbutamol',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Kortwerkende betamimetica'
            ], 
            [
                'name' => 'Terbutaline',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Kortwerkende betamimetica'
            ],
            [
                'name' => 'Ipratropium',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Kortwerkende anticholinergica'
            ],
            [
                'name' => 'Formoterol',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende betamimetica'
            ],
            [
                'name' => 'Indacaterol',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende betamimetica'
            ],
            [
                'name' => 'Salmeterol',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende betamimetica'
            ],
            [
                'name' => 'Olodaterol',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende betamimetica'
            ],
            [
                'name' => 'Tiotropium',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende anticholinergica'
            ],
            [
                'name' => 'Glycopyrronium',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende anticholinergica'
            ],
            [
                'name' => 'Aclidinium',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende anticholinergica'
            ],
            [
                'name' => 'Umeclidinium',
                'type' => 'Luchtwegverwijders',
                'subType' => 'Langwerkende anticholinergica'
            ],
            [
                'name' => 'Beclomethason',
                'type' => 'Luchtwegbeschermers',
                'subType' => ''
            ],
            [
                'name' => 'Budesonide',
                'type' => 'Luchtwegbeschermers',
                'subType' => ''
            ],
            [
                'name' => 'Ciclesonide',
                'type' => 'Luchtwegbeschermers',
                'subType' => ''
            ],
            [
                'name' => 'Fluticasonpropionaat',
                'type' => 'Luchtwegbeschermers',
                'subType' => ''
            ],
            [
                'name' => 'Corticosteroid Neusspray',
                'type' => 'Neusspray',
                'subType' => ''
            ],
        ];

        for ($i = 0; $i < count($medication); $i++) {
            DB::table('medications')->insert([
                'name' => $medication[$i]['name'],
                'type' => $medication[$i]['type'],
                'subType' => $medication[$i]['subType'],
            ]);
        }
    }
}
