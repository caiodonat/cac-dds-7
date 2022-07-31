<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\Atendimento as Atendimento;


class AtendimentoSeeder extends Seeder
{
    private function numberAtdm(){
        $carbonNow = Carbon::now('-03:00');

        $today = $carbonNow->toDateString();
        $lastAtendimento = Atendimento::all()
            ->where("date_emissao_atendimento", $today)
            ->last();

        if ($lastAtendimento != null) {
            return $lastAtendimento->numero_atendimento + 1;
        } else {
            return 1;
        }
    }

    private function rndSufxoAtdm()
    {
        $sufixo_atendimento = array('PDG', 'FCR', 'SCT', 'OTS');
        $sa = array_rand($sufixo_atendimento, 1);
        return $sufixo_atendimento[$sa];
    }
    public function run()
    {
        $carbonNow = Carbon::now('-03:00');

        DB::table('tb_atendimentos')->insert(
            [//Today
            'date_emissao_atendimento' => $carbonNow->toDateString(),
            'date_time_emissao_atendimento' => $carbonNow->toDateTimeString(),
            'cpf' => '12345678901',
            'numero_atendimento' => $this->numberAtdm(),
            'sufixo_atendimento' => $this->rndSufxoAtdm(),
            'servicos' => "serviço 1",
            'observacoes' => "Sem Observações"

        ]);
    }

}
