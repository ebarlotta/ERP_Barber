<?php

namespace App\Http\Livewire\Tablas;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tabla;
use App\Models\Venta;

class VisualizarTablaComponent extends Component
{
    public $isModalOpen = false;
    public $visualizar;

    public function render()
    {
        $this->ListadeTablas = Tabla::selectraw(' name, (select id from tabla_usuarios WHERE tabla_usuarios.tabla_id = tablas.id and tabla_usuarios.user_id = '.Auth::user()->id.') as relac_id, empresa_id, id as tabla_id')
        ->where('id','>=',1)
        ->where('empresa_id','=',session('empresa_id'))
        ->get();
        return view('livewire.tablas.visualizar-tabla-component',['datos'=> $this->ListadeTablas])->extends('layouts.adminlte');
    }

    public function ConvierteMesEnTexto($id) {
        switch ($id) {
            case 1 : $caso="Enero"; break;
            case 2 : $caso="Febrero"; break;
            case 3 : $caso="Marzo"; break;
            case 4 : $caso="Abril"; break;
            case 5 : $caso="Mayo"; break;
            case 6 : $caso="Junio"; break;
            case 7 : $caso="Julio"; break;
            case 8 : $caso="Agosto"; break;
            case 9 : $caso="Setiembre"; break;
            case 10 : $caso="Octubre"; break;
            case 11 : $caso="Noviembre"; break;
            case 12 : $caso="Diciembre"; break;
        }
        return $caso;
    }

    public function Visualizar() {
        $this->visualizar = '<table class="table table-responsive table-hover" style="font-family : Verdana; font-size : 8px; font-weight : 300;" cellspacing="0" cellpadding="0" bgcolor="#5C92FF" border="0">
        <tbody><tr>
        <td width="11"><img src="images/sup-izq.gif" width="11" height="11"></td>
        <td width="278"><img src="images/pixeltrans.gif" width="278" height="1"></td>
        <td width="11" align="right"><img src="images/sup-der.gif" width="11" height="11"></td>
        </tr>
        <tr>
        <td><img src="images/pixeltrans.gif" width="1" height="1"></td>
        <td align="center"><font color="#444" face="verdana,arial,helvetica" size="2">
        <b>LibrosIVACompras2016SA</b>
        <br>
        <br><table class="table table-responsive table-hover" style="font-family : Verdana; font-size : 10px; font-weight : 300;" border="1"><tbody>
        <tr><td bgcolor="white" align="center">Meses</td><td bgcolor="white" align="center">Bruto</td><td bgcolor="white" align="center">Iva 10,5%</td><td bgcolor="white" align="center">Iva 21,0%</td><td bgcolor="white" align="center">Iva 27,0%</td><td bgcolor="white" align="center">Exentos</td><td bgcolor="white" align="center">Imp.Int.</td><td bgcolor="white" align="center">Ret/Perc IVA</td><td bgcolor="white" align="left">Ret/Perc Ganancias</td><td bgcolor="white" align="center">Ret/Perc IB</td><td bgcolor="white" align="center">Neto</td></tr>';
        for($i=1;$i<=12;$i++) {
            $sql = Venta::selectraw('sum(BrutoComp) as BrutoComp, sum(ExentoComp) as ExentoComp, sum(ImpInternoComp) as ImpInternoComp, sum(PercepcionIvaComp) as PercepcionIvaComp, sum(RetencionIB) as RetencionIB, sum(RetencionGan) as RetencionGan, sum(NetoComp) as NetoComp')
            ->where('PasadoEnMes','=',$i)
            ->where('Anio','=',2021)
            ->where('empresa_id','=',session('empresa_id'))
            ->get();
            //dd($sql);
            foreach($sql as $sql1) {
                $this->visualizar = $this->visualizar .'
            <tr><td bgcolor="white" align="left">'. $this->ConvierteMesEnTexto($i).'</td><td bgcolor="white" align="right">'.$sql1->BrutoComp.'</td><td bgcolor="white" align="left">1</td><td bgcolor="white" align="left">2</td><td bgcolor="white" align="right">3</td><td bgcolor="white" align="right">'.$sql1->ExentoComp.'</td><td bgcolor="white" align="right">'.$sql1->ImpInternoComp.'</td><td bgcolor="white" align="right">'.$sql1->PercepcionIvaComp.'</td><td bgcolor="white" align="right">'.$sql1->RetencionIB.'</td><td bgcolor="white" align="right">'.$sql1->RetencionGan.'</td><td bgcolor="white" align="right">'.$sql1->NetoComp.'</td></tr>';
            }
            
        }


        // $this->visualizar = $this->visualizar .'</tr></tbody></table>

        // <td bgcolor="white" align="left">Enero</td><td bgcolor="white" align="right">11.813,67</td><td bgcolor="white" align="left">81,92</td><td bgcolor="white" align="left">1.828,34</td><td bgcolor="white" align="right">628,33</td><td bgcolor="white" align="right">3.911,07</td><td bgcolor="white" align="right">474,53</td><td bgcolor="white" align="right">17.860,50</td><td bgcolor="white" align="right">3.162,00</td><td bgcolor="white" align="right">5.103,00</td><td bgcolor="white" align="right">44.863,35</td></tr><tr><td bgcolor="white" align="left">Febrero</td><td bgcolor="white" align="right">11.768,14</td><td bgcolor="white" align="right">189,22</td><td bgcolor="white" align="right">1.574,41</td><td bgcolor="white" align="right">666,59</td><td bgcolor="white" align="right">1.571,32</td><td bgcolor="white" align="right">278,53</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">16.048,21</td></tr><tr><td bgcolor="white" align="left">Marzo</td><td bgcolor="white" align="right">233.933,64</td><td bgcolor="white" align="right">117,70</td><td bgcolor="white" align="right">47.605,06</td><td bgcolor="white" align="right">1.652,93</td><td bgcolor="white" align="right">8.622,60</td><td bgcolor="white" align="right">790,65</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">292.722,58</td></tr><tr><td bgcolor="white" align="left">Abril</td><td bgcolor="white" align="right">19.481,47</td><td bgcolor="white" align="right">66,86</td><td bgcolor="white" align="right">2.284,31</td><td bgcolor="white" align="right">2.151,09</td><td bgcolor="white" align="right">1.776,04</td><td bgcolor="white" align="right">243,48</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">26.003,25</td></tr><tr><td bgcolor="white" align="left">Mayo</td><td bgcolor="white" align="right">59.924,66</td><td bgcolor="white" align="right">1.407,28</td><td bgcolor="white" align="right">8.948,92</td><td bgcolor="white" align="right">1.055,19</td><td bgcolor="white" align="right">1.159,11</td><td bgcolor="white" align="right">335,25</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">1.896,66</td><td bgcolor="white" align="right">74.727,07</td></tr><tr><td bgcolor="white" align="left">Junio</td><td bgcolor="white" align="right">8.707,18</td><td bgcolor="white" align="right">63,03</td><td bgcolor="white" align="right">1.199,45</td><td bgcolor="white" align="right">646,70</td><td bgcolor="white" align="right">789,29</td><td bgcolor="white" align="right">244,37</td><td bgcolor="white" align="right">335,02</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">11.985,05</td></tr><tr><td bgcolor="white" align="left">Julio</td><td bgcolor="white" align="right">8.981,88</td><td bgcolor="white" align="right">138,66</td><td bgcolor="white" align="right">1.220,93</td><td bgcolor="white" align="right">498,78</td><td bgcolor="white" align="right">525,89</td><td bgcolor="white" align="right">166,63</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">6.074,81</td><td bgcolor="white" align="right">17.607,58</td></tr><tr><td bgcolor="white" align="left">Agosto</td><td bgcolor="white" align="right">18.776,02</td><td bgcolor="white" align="right">83,66</td><td bgcolor="white" align="right">3.585,17</td><td bgcolor="white" align="right">244,90</td><td bgcolor="white" align="right">12.661,06</td><td bgcolor="white" align="right">71,19</td><td bgcolor="white" align="right">8.085,73</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">2.310,20</td><td bgcolor="white" align="right">45.817,93</td></tr><tr><td bgcolor="white" align="left">Setiembre</td><td bgcolor="white" align="right">32.703,66</td><td bgcolor="white" align="right">26,40</td><td bgcolor="white" align="right">6.503,24</td><td bgcolor="white" align="right">400,79</td><td bgcolor="white" align="right">9.776,01</td><td bgcolor="white" align="right">1.130,10</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right"></td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">50.540,20</td></tr><tr><td bgcolor="white" align="left">Octubre</td><td bgcolor="white" align="right">86.768,96</td><td bgcolor="white" align="right">2.846,35</td><td bgcolor="white" align="right">9.946,92</td><td bgcolor="white" align="right">3.319,54</td><td bgcolor="white" align="right">3.640,75</td><td bgcolor="white" align="right">1.082,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">4.250,19</td><td bgcolor="white" align="right">111.854,71</td></tr><tr><td bgcolor="white" align="left">Noviembre</td><td bgcolor="white" align="right">17.726,59</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">659,91</td><td bgcolor="white" align="right">3.937,73</td><td bgcolor="white" align="right">4.731,94</td><td bgcolor="white" align="right">240,63</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">27.296,79</td></tr><tr><td bgcolor="white" align="left">Diciembre</td><td bgcolor="white" align="right">19.097,16</td><td bgcolor="white" align="right">115,54</td><td bgcolor="white" align="right">999,58</td><td bgcolor="white" align="right">3.573,95</td><td bgcolor="white" align="right">3.335,73</td><td bgcolor="white" align="right">146,25</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">0,00</td><td bgcolor="white" align="right">27.268,21</td></tr><tr><td bgcolor="white" align="left">Totales</td><td bgcolor="white" align="right">529.683,03</td><td bgcolor="white" align="right">5.136,62</td><td bgcolor="white" align="right">86.356,24</td><td bgcolor="white" align="right">18.776,50</td><td bgcolor="white" align="right">52.500,81</td><td bgcolor="white" align="right">5.203,61</td><td bgcolor="white" align="right">26.281,25</td><td bgcolor="white" align="right">3.162,00</td><td bgcolor="white" align="right">19.634,86</td><td bgcolor="red" align="right">0,00</td></tr><tr><td bgcolor="#D6FF9C" align="left"></td><td bgcolor="#D6FF9C" align="left"></td><td bgcolor="#D6FF9C" align="left"></td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td><td bgcolor="#D6FF9C" align="left">0,00</td></tr></tbody></table></font></td></tr></tbody></table>';
    }
}
