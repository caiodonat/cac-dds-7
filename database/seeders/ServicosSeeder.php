<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServicosSeeder extends Seeder
{
    public function run()
    {
        DB::table('tb_servicos')->insert([
            [   //PDG
                'setor' => 'PDG',
                'servico' => 'Assinatura de documentos'
            ],[
                'setor' => 'PDG',
                'servico' => 'Relatório de finalização de curso'
            ],[
                'setor' => 'PDG',
                'servico' => 'Cancelamento de curso'
            ],[
                'setor' => 'PDG',
                'servico' => 'Atendimento Pedagógico'
            ],
            [   //FCR
                'setor' => 'FCR',
                'servico' => 'Pagamento de Boleto'
            ],[
                'setor' => 'FCR',
                'servico' => 'Demonstrativo do Imposto de Renda'
            ],[
                'setor' => 'FCR',
                'servico' => 'Reembolso'
            ],
            [   //SCT
                'setor' => 'SCT',
                'servico' => 'Certificado de finalização de curso'
            ],[
                'setor' => 'SCT',
                'servico' => 'Reenquadramento de curso'
            ],[
                'setor' => 'SCT',
                'servico' => 'Segunda via de Documentos'
            ],[
                'setor' => 'SCT',
                'servico' => 'Declarações (Matrícula, Aposentadoria, Emenda...) '
            ],[
                'setor' => 'SCT',
                'servico' => 'Histórico Escolar'
            ],
            [   //OTS
                'setor' => 'OTS',
                'servico' => 'Qual sala/instrutor será hoje?'
            ],[
                'setor' => 'OTS',
                'servico' => 'Agendamento de Salas e/ou Auditório'
            ],[
                'setor' => 'OTS',
                'servico' => 'Divulgação de Estágio'
            ]
        ]);
    }
}