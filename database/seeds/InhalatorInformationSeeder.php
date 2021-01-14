<?php

use Illuminate\Database\Seeder;

class InhalatorInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inhalator_information')->truncate();

        $inhalatorInformation = [
            [
                'inhalatorName' => 'Airomir dosisaerosol autohaler',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Airomir dosisaerosol autohaler.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Qvar dosisaerosol Extrafijn Autohaler',
                'fabrikant' => 'TEVA Pharma Nederland',
                'afbeelding' => '/inhalators/Qvar dosisaerosol Extrafijn Autohaler.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Onbrez inhalatiepoeder Breezhaler',
                'fabrikant' => 'Novartis Pharma bv',
                'afbeelding' => '/inhalators/Onbrez inhalatiepoeder Breezhaler.png',
                'gebruikMedicijn' => 'indacaterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Seebri Breezhaler',
                'fabrikant' => 'Novartis Pharma bv',
                'afbeelding' => '/inhalators/Seebri Breezhaler.png',
                'gebruikMedicijn' => 'glycopyrronium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Ultibro Breezhaler',
                'fabrikant' => 'Novartis Pharma bv',
                'afbeelding' => '/inhalators/Ultibro Breezhaler.png',
                'gebruikMedicijn' => 'indacaterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Ultibro Breezhaler',
                'fabrikant' => 'Novartis Pharma bv',
                'afbeelding' => '/inhalators/Ultibro Breezhaler.png',
                'gebruikMedicijn' => 'glycopyrronium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Beclometason inhalatiepoeder Cyclocaps',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Beclometason inhalatiepoeder Cyclocaps.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Budesonide inhalatiepoeder Cyclohaler',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Budesonide inhalatiepoeder Cyclohaler.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Formoterol inhalatiepoeder Cyclohaler',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Formoterol inhalatiepoeder Cyclohaler.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Ipratropium inhalatiepoeder Cyclohaler',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Ipratropium inhalatiepoeder Cyclohaler.png',
                'gebruikMedicijn' => 'ipratropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Salbutamol cyclohaler inhalatiepoeder',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Salbutamol cyclohaler inhalatiepoeder.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Flixotide inhalatiepoeder Diskus',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Flixotide inhalatiepoeder Diskus.png',
                'gebruikMedicijn' => 'fluticasonpropionaat',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Seretide inhalatiepoeder Diskus',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Seretide inhalatiepoeder Diskus.png',
                'gebruikMedicijn' => 'salmeterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Seretide inhalatiepoeder Diskus',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Seretide inhalatiepoeder Diskus.png',
                'gebruikMedicijn' => 'fluticasonpropionaat',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Serevent inhalatiepoeder Diskus',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Serevent inhalatiepoeder Diskus.png',
                'gebruikMedicijn' => 'salmeterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Ventolin inhalatiepoeder Diskus',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Ventolin inhalatiepoeder Diskus.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Airomir dosisaerosol',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Airomir dosisaerosol.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Alvesco dosisaerosol inhalator',
                'fabrikant' => 'Covis Pharma Europe B.V.',
                'afbeelding' => '/inhalators/Alvesco dosisaerosol inhalator.png',
                'gebruikMedicijn' => 'ciclesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Atimos dosisaerosol',
                'fabrikant' => 'Chiesi Pharmaceuticals BV',
                'afbeelding' => '/inhalators/Atimos dosisaerosol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Atrovent dosisaerosol',
                'fabrikant' => 'BoehringerIngelheim',
                'afbeelding' => '/inhalators/Atrovent dosisaerosol.png',
                'gebruikMedicijn' => 'ipratropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Beclometason dosisaerosol',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Beclometason dosisaerosol.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Berodual dosisaerosol',
                'fabrikant' => 'BoehringerIngelheim',
                'afbeelding' => '/inhalators/Berodual dosisaerosol.png',
                'gebruikMedicijn' => 'ipratropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Bevespi Aerosphere',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Bevespi Aerosphere.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Bevespi Aerosphere',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Bevespi Aerosphere.png',
                'gebruikMedicijn' => 'glycopyrronium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Budesonide dosisaerosol',
                'fabrikant' => 'Mylan',
                'afbeelding' => '/inhalators/Budesonide dosisaerosol Mylan.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Flixotide dosisaerosol',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Flixotide dosisaerosol.png',
                'gebruikMedicijn' => 'fluticasonpropionaat',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Flutiform dosisaerosol',
                'fabrikant' => 'Mundipharma',
                'afbeelding' => '/inhalators/Flutiform dosisaerosol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Flutiform dosisaerosol',
                'fabrikant' => 'Mundipharma',
                'afbeelding' => '/inhalators/Flutiform dosisaerosol.png',
                'gebruikMedicijn' => 'fluticasonpropionaat',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Foster dosisaerosol',
                'fabrikant' => 'Chiesi Pharmaceuticals BV',
                'afbeelding' => '/inhalators/Foster dosisaerosol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],            
            [
                'inhalatorName' => 'Foster dosisaerosol',
                'fabrikant' => 'Chiesi Pharmaceuticals BV',
                'afbeelding' => '/inhalators/Foster dosisaerosol.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Qvar dosisaerosol extrafijn',
                'fabrikant' => 'TEVA Pharma Nederland',
                'afbeelding' => '/inhalators/Qvar dosisaerosol extrafijn.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Salbutamol dosisaerosol',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Salbutamol dosisaerosol.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Seretide dosisaerosol',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Seretide dosisaerosol.png',
                'gebruikMedicijn' => 'salmeterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Seretide dosisaerosol',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Seretide dosisaerosol.png',
                'gebruikMedicijn' => 'fluticasonpropionaat',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Serevent dosisaerosol',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Serevent dosisaerosol.png',
                'gebruikMedicijn' => 'salmeterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Symbicort dosisaerosol',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Symbicort dosisaerosol.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Symbicort dosisaerosol',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Symbicort dosisaerosol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Trimbow dosisaerosol',
                'fabrikant' => 'Chiesi',
                'afbeelding' => '/inhalators/Trimbow dosisaerosol.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Trimbow dosisaerosol',
                'fabrikant' => 'Chiesi',
                'afbeelding' => '/inhalators/Trimbow dosisaerosol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Trimbow dosisaerosol',
                'fabrikant' => 'Chiesi',
                'afbeelding' => '/inhalators/Trimbow dosisaerosol.png',
                'gebruikMedicijn' => 'glycopyrronium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Ventolin dosisaerosol',
                'fabrikant' => 'GlaxoSmithKline',
                'afbeelding' => '/inhalators/Ventolin dosisaerosol.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Easyhaler met Budesonide',
                'fabrikant' => 'Orion Pharma Benelux',
                'afbeelding' => '/inhalators/Easyhaler met Budesonide.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Easyhaler met combinatie Budesonide / Formoterol',
                'fabrikant' => 'Orion Pharma Benelux',
                'afbeelding' => '/inhalators/Easyhaler met combinatie Budesonide a Formoterol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Easyhaler met combinatie Budesonide / Formoterol',
                'fabrikant' => 'Orion Pharma Benelux',
                'afbeelding' => '/inhalators/Easyhaler met combinatie Budesonide a Formoterol.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Easyhaler met Formoterol',
                'fabrikant' => 'Orion Pharma Benelux',
                'afbeelding' => '/inhalators/Easyhaler met Formoterol.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Incruse Ellipta',
                'fabrikant' => 'GSK',
                'afbeelding' => '/inhalators/Incruse Ellipta.png',
                'gebruikMedicijn' => 'umeclidinium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Elpenhaler',
                'fabrikant' => 'Focus Care Pharmaceuticals',
                'afbeelding' => '/inhalators/Elpenhaler.png',
                'gebruikMedicijn' => 'salmeterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Elpenhaler',
                'fabrikant' => 'Focus Care Pharmaceuticals',
                'afbeelding' => '/inhalators/Elpenhaler.png',
                'gebruikMedicijn' => 'fluticason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Eklira Genuair Inhalatiepoeder',
                'fabrikant' => 'AstraZeneca bv',
                'afbeelding' => '/inhalators/Eklira Genuair Inhalatiepoeder.png',
                'gebruikMedicijn' => 'aclidinium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiriva inhalatiepoeder Handihaler',
                'fabrikant' => 'BoehringerIngelheim',
                'afbeelding' => '/inhalators/Spiriva inhalatiepoeder Handihaler.png',
                'gebruikMedicijn' => 'tiotropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Foster inhalatiepoeder Nexthaler',
                'fabrikant' => 'Chiesi Pharmaceuticals BV',
                'afbeelding' => '/inhalators/Foster inhalatiepoeder Nexthaler.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Foster inhalatiepoeder Nexthaler',
                'fabrikant' => 'Chiesi Pharmaceuticals BV',
                'afbeelding' => '/inhalators/Foster inhalatiepoeder Nexthaler.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Budesonide inhalatiepoeder Novolizer',
                'fabrikant' => 'Mylan BV',
                'afbeelding' => '/inhalators/Budesonide inhalatiepoeder Novolizer.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Formoterol inhalatiepoeder Novolizer',
                'fabrikant' => 'Mylan BV',
                'afbeelding' => '/inhalators/Formoterol inhalatiepoeder Novolizer.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Salbutamol inhalatiepoeder Novolizer',
                'fabrikant' => 'Mylan BV',
                'afbeelding' => '/inhalators/Salbutamol inhalatiepoeder Novolizer.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Redihaler',
                'fabrikant' => 'TEVA Pharma',
                'afbeelding' => '/inhalators/Redihaler.png',
                'gebruikMedicijn' => 'beclomethason',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Salbutamol Redihaler dosisaerosol',
                'fabrikant' => 'Teva Pharma',
                'afbeelding' => '/inhalators/Salbutamol Redihaler dosisaerosol.png',
                'gebruikMedicijn' => 'salbutamol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiolto Respimat',
                'fabrikant' => 'Boehringer Ingelheim',
                'afbeelding' => '/inhalators/Spiolto Respimat.png',
                'gebruikMedicijn' => 'tiotropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiolto Respimat',
                'fabrikant' => 'Boehringer Ingelheim',
                'afbeelding' => '/inhalators/Spiolto Respimat.png',
                'gebruikMedicijn' => 'olodaterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiriva Respimat',
                'fabrikant' => 'Boehringer Ingelheim',
                'afbeelding' => '/inhalators/Spiriva Respimat.png',
                'gebruikMedicijn' => 'tiotropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Striverdi Respimat',
                'fabrikant' => 'Boehringer Ingelheim',
                'afbeelding' => '/inhalators/Striverdi Respimat.png',
                'gebruikMedicijn' => 'olodaterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiromax 160mcg',
                'fabrikant' => 'Teva',
                'afbeelding' => '/inhalators/Spiromax 160mcg.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiromax 160mcg',
                'fabrikant' => 'Teva',
                'afbeelding' => '/inhalators/Spiromax 160mcg.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiromax 320mcg',
                'fabrikant' => 'Teva',
                'afbeelding' => '/inhalators/Spiromax 320mcg.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Spiromax 320mcg',
                'fabrikant' => 'Teva',
                'afbeelding' => '/inhalators/Spiromax 320mcg.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Bricanyl inhalatiepoeder Turbuhaler',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Bricanyl inhalatiepoeder Turbuhaler.png',
                'gebruikMedicijn' => 'terbutaline',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Oxis inhalatiepoeder Turbuhaler',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Oxis inhalatiepoeder Turbuhaler.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Pulmicort inhalatiepoeder Turbuhaler',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Pulmicort inhalatiepoeder Turbuhaler.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Symbicort inhalatiepoeder Turbuhaler',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Symbicort inhalatiepoeder Turbuhaler.png',
                'gebruikMedicijn' => 'formoterol',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Symbicort inhalatiepoeder Turbuhaler',
                'fabrikant' => 'AstraZeneca',
                'afbeelding' => '/inhalators/Symbicort inhalatiepoeder Turbuhaler.png',
                'gebruikMedicijn' => 'budesonide',
                'type' => "Luchtwegbeschermers",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Zonda',
                'fabrikant' => 'Teva',
                'afbeelding' => '/inhalators/Zonda.png',
                'gebruikMedicijn' => 'tiotropium',
                'type' => "Luchtwegverwijders",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Avamys corticosteroid neusspray',
                'fabrikant' => 'GSK',
                'afbeelding' => '/inhalators/Avamys corticosteroid neusspray.png',
                'gebruikMedicijn' => 'corticosteroid neusspray',
                'type' => "Neusspray",
                'color' => 'white',
                'state' => false
            ],
            [
                'inhalatorName' => 'Corticosteroid neusspray',
                'fabrikant' => '',
                'afbeelding' => '/inhalators/Corticosteroid neusspray.png',
                'gebruikMedicijn' => 'corticosteroid neusspray',
                'type' => "Neusspray",
                'color' => 'white',
                'state' => false
            ]
        ];

        for ($i = 0; $i < count($inhalatorInformation); $i++) {
            DB::table('inhalator_information')->insert([
                'inhalatorName' => $inhalatorInformation[$i]['inhalatorName'],
                'fabrikant' => $inhalatorInformation[$i]['fabrikant'],
                'afbeelding' => $inhalatorInformation[$i]['afbeelding'],
                'gebruikMedicijn' => $inhalatorInformation[$i]['gebruikMedicijn'],
                'type' => $inhalatorInformation[$i]['type'],
                'color' => $inhalatorInformation[$i]['color'],
                'state' => $inhalatorInformation[$i]['state'],
            ]);
        }
    }
}
