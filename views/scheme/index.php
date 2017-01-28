<?php use yii\helpers\Url; ?>
<div style="float: left; " >
<table  class="schema_search" width="100%" border="0" align="center" >
    <tr>
        <td>
            <h1>Схемы кулачковых переключателей</h1>
        </td>
        <td align = "right">
            <div><h4>Введите номер схемы</h4>
            </div>
            <div>
                <form name = "form_serch" action = "outpagescheme1.php"  method = "get">
                    <input type = "text" name = "number" size="10"/>
                    <input type = "submit" value = "Просмотр" />
                </form>
            </div>
        </td>
    </tr>
</table>

<a href = "#" ><img id="img1" onClick = "clicked('table1', 'img1');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table1', 'img1'); "  title = 'Ступенчатые схемы переключателей с положением "0"'><h2>Ступенчатые схемы с положением "0"</h2></a>
<script type='text/javascript'>
    function clicked(idtable, idimg) {
        if (document.getElementById(idtable).style.display == "none"){
            document.getElementById(idtable).style.display = "block";
            document.getElementById(idimg).src = "/images/minus.jpeg";
        }
        else{
            document.getElementById(idtable).style.display = "none";
            document.getElementById(idimg).src = "/images/plus.jpeg";
        }
    }
</script>
<div id = "table1" style = "display: none;">
    <table  class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th rowspan="2" class = "block">Количество<br> направлений</th>
            <th colspan="11">Количество положений</th>

        </tr>
        <tr>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
        </tr>
        <tr>
            <th>1</th>
            <td><a href = "?n=1101" title = "схема 1101">1101</a></th>
            <td><a href = "2201" title = "схема 2201">2201</a></td>
            <td><a href = "<?=Url::to(['scheme/', 'number' => 2301]) ?>" title = "схема 2301">2301</a></td>
            <td><a href = "<?=Url::to('2401') ?>" title = "схема 2401">2401</a></td>
            <td><a href = "2501" title = "схема 2501">2501</a></td>
            <td><a href = "2601" title = "схема 2601">2601</a></td>
            <td><a href = "2701" title = "схема 2701">2701</a></td>
            <td><a href = "2801" title = "схема 2801">2801</a></td>
            <td><a href = "2901" title = "схема 2901">2901</a></td>
            <td><a href = "4001" title = "схема 4001">4001</a></td>
            <td><a href = "4101" title = "схема 4101">4101</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td><a href = "1102" title = "схема 1102">1102</a></th>
            <td><a href = "2202" title = "схема 2202">2202</a></td>
            <td><a href = "2302" title = "схема 2302">2302</a></td>
            <td><a href = "2402" title = "схема 2402">2402</a></td>
            <td><a href = "2502" title = "схема 2502">2502</a></td>
            <td><a href = "2602" title = "схема 2602">2602</a></td>
            <td><a href = "2702" title = "схема 2702">2702</a></td>
            <td><a href = "2802" title = "схема 2802">2802</a></td>
            <td><a href = "2902" title = "схема 2902">2902</a></td>
            <td><a href = "4002" title = "схема 4002">4002</a></td>
            <td><a href = "4102" title = "схема 4102">4102</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td><a href = "1103" title = "схема 1103">1103</a></th>
            <td><a href = "2203" title = "схема 2203">2203</a></td>
            <td><a href = "2303" title = "схема 2303">2303</a></td>
            <td><a href = "2403" title = "схема 2403">2403</a></td>
            <td><a href = "2503" title = "схема 2503">2503</a></td>
            <td><a href = "2603" title = "схема 2603">2603</a></td>
            <td><a href = "2703" title = "схема 2703">2703</a></td>
            <td><a href = "2803" title = "схема 2803">2803</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td><a href = "1104" title = "схема 1104">1104</a></th>
            <td><a href = "2204" title = "схема 2204">2204</a></td>
            <td><a href = "2304" title = "схема 2304">2304</a></td>
            <td><a href = "2404" title = "схема 2404">2404</a></td>
            <td><a href = "2504" title = "схема 2504">2504</a></td>
            <td><a href = "2604" title = "схема 2604">2604</a></td>

        </tr>
        <tr>
            <th>5</th>
            <td><a href = "1105" title = "схема 1105">1105</a></th>
            <td><a href = "2205" title = "схема 2205">2205</a></td>
            <td><a href = "2305" title = "схема 2305">2305</a></td>
            <td><a href = "2405" title = "схема 2405">2405</a></td>

        </tr>
        <tr>
            <th>6</th>
            <td><a href = "1106" title = "схема 1106">1106</a></th>
            <td><a href = "2206" title = "схема 2206">2206</a></td>
            <td><a href = "2306" title = "схема 2306">2306</a></td>
            <td><a href = "2406" title = "схема 2406">2406</a></td>

        </tr>
        <tr>
            <th>7</th>
            <td><a href = "1107" title = "схема 1107">1107</a></th>
            <td><a href = "2207" title = "схема 2207">2207</a></td>
            <td><a href = "2307" title = "схема 2307">2307</a></td>
        </tr>
        <tr>
            <th>8</th>
            <td><a href = "1108" title = "схема 1108">1108</a></th>
            <td><a href = "2208" title = "схема 2208">2208</a></td>
            <td><a href = "2308" title = "схема 2308">2308</a></td>
        </tr>
        <tr>
            <th>9</th>
            <td><a href = "1109" title = "схема 1109">1109</a></th>
            <td><a href = "2209" title = "схема 2209">2209</a></td>
        </tr>
        <tr>
            <th>10</th>
            <td><a href = "1110" title = "схема 1110">1110</a></th>
            <td><a href = "2210" title = "схема 2210">2210</a></td>
        </tr>
        <tr>
            <th>11</th>
            <td><a href = "1111" title = "схема 1111">1111</a></th>
            <td><a href = "2211" title = "схема 2211">2211</a></td>
        </tr>
        <tr>
            <th>12</th>
            <td><a href = "1112" title = "схема 1112">1112</a></th>
            <td><a href = "2212" title = "схема 2212">2212</a></td>
        </tr>
        <tr>
            <th>13</th>
            <td><a href = "1113" title = "схема 1113">1113</a></th>
        </tr>
        <tr>
            <th>14</th>
            <td><a href = "1114" title = "схема 1114">1114</a></th>
        </tr>
        <tr>
            <th>15</th>
            <td><a href = "1115" title = "схема 1115">1115</a></th>
        </tr>
        <tr>
            <th>16</th>
            <td><a href = "1116" title = "схема 1116">1116</a></th>
        </tr>
        <tr>
            <th>17</th>
            <td><a href = "1117" title = "схема 1117">1117</a></th>
        </tr>
        <tr>
            <th>18</th>
            <td><a href = "1118" title = "схема 1118">1118</a></th>
        </tr>
        <tr>
            <th>19</th>
            <td><a href = "1119" title = "схема 1119">1119</a></th>
        </tr>
        <tr>
            <th>20</th>
            <td><a href = "1120" title = "схема 1120">1120</a></th>
        </tr>
        <tr>
            <th>21</th>
            <td><a href = "1121" title = "схема 1121">1121</a></th>
        </tr>
        <tr>
            <th>22</th>
            <td><a href = "1122" title = "схема 1113">1122</a></th>
        </tr>
        <tr>
            <th>23</th>
            <td><a href = "1123" title = "схема 1123">1123</a></th>
        </tr>
        <tr>
            <th>24</th>
            <td><a href = "1124" title = "схема 1124">1124</a></th>
        </tr>
    </table>
</div>
<a href = "#" ><img id="img2" onClick = "clicked('table2', 'img2');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table2','img2');" title = 'Ступенчатые схемы переключателей с положением "0"'><h2>Ступенчатые схемы без положения "0"</h2></a>
<div id = "table2" style = "display: none;">
    <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th rowspan="2" class = "block">Количество<br> направлений</th>
            <th colspan="11">Количество положений</th>

        </tr>
        <tr>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
        </tr>
        <tr>
            <th>1</th>
            <td><a href = "2251" title = "схема 2251">2251</a></th>
            <td><a href = "2351" title = "схема 2351">2351</a></td>
            <td><a href = "2451" title = "схема 2451">2451</a></td>
            <td><a href = "2551" title = "схема 2551">2551</a></td>
            <td><a href = "2651" title = "схема 2651">2651</a></td>
            <td><a href = "2751" title = "схема 2751">2751</a></td>
            <td><a href = "2851" title = "схема 2851">2851</a></td>
            <td><a href = "2951" title = "схема 2951">2951</a></td>
            <td><a href = "4051" title = "схема 4051">4051</a></td>
            <td><a href = "4151" title = "схема 4151">4151</a></td>
            <td><a href = "4251" title = "схема 4251">4251</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td><a href = "2252" title = "схема 2252">2252</a></th>
            <td><a href = "2352" title = "схема 2352">2352</a></td>
            <td><a href = "2452" title = "схема 2452">2452</a></td>
            <td><a href = "2552" title = "схема 2552">2552</a></td>
            <td><a href = "2652" title = "схема 2652">2652</a></td>
            <td><a href = "2752" title = "схема 2752">2752</a></td>
            <td><a href = "2852" title = "схема 2852">2852</a></td>
            <td><a href = "2952" title = "схема 2952">2952</a></td>
            <td><a href = "4052" title = "схема 4052">4052</a></td>
            <td><a href = "4152" title = "схема 4152">4152</a></td>
            <td><a href = "4252" title = "схема 4252">4252</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td><a href = "2253" title = "схема 2253">2253</a></th>
            <td><a href = "2353" title = "схема 2353">2353</a></td>
            <td><a href = "2453" title = "схема 2453">2453</a></td>
            <td><a href = "2553" title = "схема 2553">2553</a></td>
            <td><a href = "2653" title = "схема 2653">2653</a></td>
            <td><a href = "2753" title = "схема 2753">2753</a></td>
            <td><a href = "2853" title = "схема 2853">2853</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td><a href = "2254" title = "схема 2254">2254</a></th>
            <td><a href = "2354" title = "схема 2354">2354</a></td>
            <td><a href = "2454" title = "схема 2454">2454</a></td>
            <td><a href = "2554" title = "схема 2554">2554</a></td>
            <td><a href = "2654" title = "схема 2654">2654</a></td>
        </tr>
        <tr>
            <th>5</th>
            <td><a href = "2255" title = "схема 2255">2255</a></th>
            <td><a href = "2355" title = "схема 2355">2355</a></td>
            <td><a href = "2455" title = "схема 2455">2455</a></td>
        </tr>
        <tr>
            <th>6</th>
            <td><a href = "2256" title = "схема 2256">2256</a></th>
            <td><a href = "2356" title = "схема 2356">2356</a></td>
            <td><a href = "2456" title = "схема 2456">2456</a></td>
        </tr>
        <tr>
            <th>7</th>
            <td><a href = "2257" title = "схема 2257">2257</a></th>
            <td><a href = "2357" title = "схема 2357">2357</a></td>
        </tr>
        <tr>
            <th>8</th>
            <td><a href = "2258" title = "схема 2258">2258</a></th>
            <td><a href = "2358" title = "схема 2358">2358</a></td>
        </tr>
        <tr>
            <th>9</th>
            <td><a href = "2259" title = "схема 2259">2259</a></th>
        </tr>
        <tr>
            <th>10</th>
            <td><a href = "2260" title = "схема 2260">2260</a></th>
        </tr>
        <tr>
            <th>11</th>
            <td><a href = "2261" title = "схема 2261">2261</a></th>
        </tr>
        <tr>
            <th>12</th>
            <td><a href = "2262" title = "схема 2262">2262</a></th>
        </tr>
    </table>
</div>
<a href = "#" ><img id="img3" onClick = "clicked('table3', 'img3');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table3', 'img3');" title = 'Ступенчатые схемы переключателей без разрыва цепи при переключении'><h2>Ступенчатые схемы без разрыва цепи при переключении</h2></a>
<div id = "table3" style = "display: none;">
    <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th rowspan="2" class = "block">Количество<br> направлений</th>
            <th colspan="10">Количество положений</th>

        </tr>
        <tr>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
        </tr>
        <tr>
            <th>1</th>
            <td><a href = "5201" title = "схема 5201">5201</a></th>
            <td><a href = "5301" title = "схема 5301">5301</a></td>
            <td><a href = "5401" title = "схема 5401">5401</a></td>
            <td><a href = "5501" title = "схема 5501">5501</a></td>
            <td><a href = "5601" title = "схема 5601">5601</a></td>
            <td><a href = "5701" title = "схема 5701">5701</a></td>
            <td><a href = "5801" title = "схема 5801">5801</a></td>
            <td><a href = "5901" title = "схема 5901">5901</a></td>
            <td><a href = "6001" title = "схема 6001">6001</a></td>
            <td><a href = "6101" title = "схема 6101">6101</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td><a href = "5202" title = "схема 5202">5202</a></th>
            <td><a href = "5302" title = "схема 5302">5302</a></td>
            <td><a href = "5402" title = "схема 5402">5402</a></td>
            <td><a href = "5502" title = "схема 5502">5502</a></td>
            <td><a href = "5602" title = "схема 5602">5602</a></td>
            <td><a href = "5702" title = "схема 5702">5702</a></td>
            <td><a href = "5802" title = "схема 5802">5802</a></td>
            <td><a href = "5902" title = "схема 5902">5902</a></td>
            <td><a href = "6002" title = "схема 6002">6002</a></td>
            <td><a href = "6102" title = "схема 6102">6102</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td><a href = "5203" title = "схема 5203">5203</a></th>
            <td><a href = "5303" title = "схема 5303">5303</a></td>
            <td><a href = "5403" title = "схема 5403">5403</a></td>
            <td><a href = "5503" title = "схема 5503">5503</a></td>
            <td><a href = "5603" title = "схема 5603">5603</a></td>
            <td><a href = "5703" title = "схема 5703">5703</a></td>
            <td><a href = "5803" title = "схема 5803">5803</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td><a href = "5204" title = "схема 5204">5204</a></th>
            <td><a href = "5304" title = "схема 5304">5304</a></td>
            <td><a href = "5404" title = "схема 5404">5404</a></td>
            <td><a href = "5504" title = "схема 5504">5504</a></td>
            <td><a href = "5604" title = "схема 5604">5604</a></td>
        </tr>
        <tr>
            <th>5</th>
            <td><a href = "5205" title = "схема 5205">5205</a></th>
            <td><a href = "5305" title = "схема 5305">5305</a></td>
            <td><a href = "5405" title = "схема 5405">5405</a></td>
        </tr>
        <tr>
            <th>6</th>
            <td><a href = "5206" title = "схема 5206">5206</a></th>
            <td><a href = "5306" title = "схема 5306">5306</a></td>
            <td><a href = "5406" title = "схема 5406">5406</a></td>
        </tr>
        <tr>
            <th>7</th>
            <td><a href = "5207" title = "схема 5207">5207</a></th>
            <td><a href = "5307" title = "схема 5307">5307</a></td>
        </tr>
        <tr>
            <th>8</th>
            <td><a href = "5208" title = "схема 5208">5208</a></th>
            <td><a href = "5308" title = "схема 5308">5308</a></td>
        </tr>
        <tr>
            <th>9</th>
            <td><a href = "5209" title = "схема 5209">5209</a></th>
        </tr>
        <tr>
            <th>10</th>
            <td><a href = "5210" title = "схема 5210">5210</a></th>
        </tr>
        <tr>
            <th>11</th>
            <td><a href = "5211" title = "схема 5211">5211</a></th>
        </tr>
        <tr>
            <th>12</th>
            <td><a href = "5212" title = "схема 5212">5212</a></th>
        </tr>
    </table>
</div>
<a href = "#" ><img id="img4" onClick = "clicked('table4', 'img4');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table4', 'img4');" title = 'Ступенчатые схемы переключателей с перекрытием контактов с положением "0"'><h2>Ступенчатые схемы с перекрытием контактов с положением "0"</h2></a>
<div id = "table4" style = "display: none;">
    <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th rowspan="2" class = "block">Количество<br> направлений</th>
            <th colspan="4">Количество положений</th>

        </tr>
        <tr>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
        </tr>
        <tr>
            <th>1</th>
            <td><a href = "2231" title = "схема 2231">2231</a></th>
            <td><a href = "2331" title = "схема 2331">2331</a></td>
            <td><a href = "2431" title = "схема 2431">2431</a></td>
            <td><a href = "2531" title = "схема 2531">2531</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td><a href = "2232" title = "схема 2232">2232</a></th>
            <td><a href = "2332" title = "схема 2332">2332</a></td>
            <td><a href = "2432" title = "схема 2432">2432</a></td>
            <td><a href = "2532" title = "схема 2532">2532</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td><a href = "2233" title = "схема 2233">2233</a></th>
            <td><a href = "2333" title = "схема 2333">2333</a></td>
            <td><a href = "2433" title = "схема 2433">2433</a></td>
            <td><a href = "2533" title = "схема 2533">2533</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td><a href = "2234" title = "схема 2234">2234</a></th>
            <td><a href = "2334" title = "схема 2334">2334</a></td>
            <td><a href = "2434" title = "схема 2434">2434</a></td>
            <td><a href = "2534" title = "схема 2534">2534</a></td>
        </tr>
        <tr>
            <th>5</th>
            <td><a href = "2235" title = "схема 2235">2235</a></th>
            <td><a href = "2335" title = "схема 2335">2335</a></td>
            <td><a href = "2435" title = "схема 2435">2435</a></td>
        </tr>
        <tr>
            <th>6</th>
            <td><a href = "2236" title = "схема 2236">2236</a></th>
            <td><a href = "2336" title = "схема 2336">2336</a></td>
            <td><a href = "2436" title = "схема 2436">2436</a></td>
        </tr>
        <tr>
            <th>7</th>
            <td><a href = "2237" title = "схема 2237">2237</a></th>
            <td><a href = "2337" title = "схема 2337">2337</a></td>
        </tr>
        <tr>
            <th>8</th>
            <td><a href = "2238" title = "схема 2238">2238</a></th>
            <td><a href = "2338" title = "схема 2338">2338</a></td>
        </tr>
        <tr>
            <th>9</th>
            <td><a href = "2239" title = "схема 2239">2239</a></th>
        </tr>
        <tr>
            <th>10</th>
            <td><a href = "2240" title = "схема 2240">2240</a></th>
        </tr>
        <tr>
            <th>11</th>
            <td><a href = "2241" title = "схема 2241">2241</a></th>
        </tr>
        <tr>
            <th>12</th>
            <td><a href = "2242" title = "схема 2242">2242</a></th>
        </tr>
    </table>
</div>
<a href = "#" ><img id="img5" onClick = "clicked('table5', 'img5');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table5', 'img5');" title = 'Ступенчатые схемы переключателей с перекрытием контактов без положения "0"'><h2>Ступенчатые схемы с перекрытием контактов без положения "0"</h2></a>
<div id = "table5" style = "display: none;">
    <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th rowspan="2" class = "block">Количество<br> направлений</th>
            <th colspan="5">Количество положений</th>

        </tr>
        <tr>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
        </tr>
        <tr>
            <th>1</th>
            <td><a href = "2271" title = "схема 2271">2271</a></th>
            <td><a href = "2371" title = "схема 2371">2371</a></td>
            <td><a href = "2471" title = "схема 2471">2471</a></td>
            <td><a href = "2571" title = "схема 2571">2571</a></td>
            <td><a href = "2671" title = "схема 2671">2671</a></td>
        </tr>
        <tr>
            <th>2</th>
            <td><a href = "2272" title = "схема 2272">2272</a></th>
            <td><a href = "2372" title = "схема 2372">2372</a></td>
            <td><a href = "2472" title = "схема 2472">2472</a></td>
            <td><a href = "2572" title = "схема 2572">2572</a></td>
            <td><a href = "2672" title = "схема 2672">2672</a></td>
        </tr>
        <tr>
            <th>3</th>
            <td><a href = "2273" title = "схема 2273">2273</a></th>
            <td><a href = "2373" title = "схема 2373">2373</a></td>
            <td><a href = "2473" title = "схема 2473">2473</a></td>
            <td><a href = "2573" title = "схема 2573">2573</a></td>
            <td><a href = "2673" title = "схема 2673">2673</a></td>
        </tr>
        <tr>
            <th>4</th>
            <td><a href = "2274" title = "схема 2274">2274</a></th>
            <td><a href = "2374" title = "схема 2374">2374</a></td>
            <td><a href = "2474" title = "схема 2474">2474</a></td>
            <td><a href = "2574" title = "схема 2574">2574</a></td>
            <td><a href = "2674" title = "схема 2674">2674</a></td>
        </tr>
        <tr>
            <th>5</th>
            <td><a href = "2275" title = "схема 2275">2275</a></th>
            <td><a href = "2375" title = "схема 2375">2375</a></td>
            <td><a href = "2475" title = "схема 2475">2475</a></td>
        </tr>
        <tr>
            <th>6</th>
            <td><a href = "2276" title = "схема 2276">2276</a></th>
            <td><a href = "2376" title = "схема 2376">2376</a></td>
            <td><a href = "2476" title = "схема 2476">2476</a></td>
        </tr>
        <tr>
            <th>7</th>
            <td><a href = "2277" title = "схема 2277">2277</a></th>
            <td><a href = "2377" title = "схема 2377">2377</a></td>
        </tr>
        <tr>
            <th>8</th>
            <td><a href = "2278" title = "схема 2278">2278</a></th>
            <td><a href = "2378" title = "схема 2378">2378</a></td>
        </tr>
        <tr>
            <th>9</th>
            <td><a href = "2279" title = "схема 2279">2279</a></th>
        </tr>
        <tr>
            <th>10</th>
            <td><a href = "2280" title = "схема 2280">2280</a></th>
        </tr>
        <tr>
            <th>11</th>
            <td><a href = "2281" title = "схема 2281">2281</a></th>
        </tr>
        <tr>
            <th>12</th>
            <td><a href = "2282" title = "схема 2282">2282</a></th>
        </tr>
    </table>
</div>
<a href = "#" ><img id="img6" onClick = "clicked('table6', 'img6');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
<a href = "#" class="schema" onClick = "clicked('table6', 'img6');" title = 'Функциональные схемы переключателей'><h2>Функциональные схемы</h2></a>
<div id = "table6" style = "display: none;">
    <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
        <tr>
            <th  class = "block">Назначение</th>
            <th colspan="9">Номер схемы</th>

        </tr>

        <tr>
            <th>Для переключения ТЭНов</th>
            <td><a href = "7192" title = "схема 7192">7192</a></th>
            <td><a href = "7194" title = "схема 7194">7194</a></td>
            <td><a href = "7201" title = "схема 7201">7201</a></td>
            <td><a href = "7202" title = "схема 7202">7202</a></td>
            <td><a href = "7204" title = "схема 7204">7204</a></td>
            <td><a href = "7207" title = "схема 7207">7207</a></td>
            <td><a href = "7211" title = "схема 7211">7211</a></td>
            <td><a href = "7607" title = "схема 7607">7607</a></td>
        </tr>
        <tr>
            <th>Для амперметров</th>
            <td><a href = "8051" title = "схема 8051">8051</a></th>
            <td><a href = "8052" title = "схема 8052">8052</a></td>
            <td><a href = "8053" title = "схема 8053">8053</a></td>
            <td><a href = "8101" title = "схема 8101">8101</a></td>
            <td><a href = "8102" title = "схема 8102">8102</a></td>
            <td><a href = "8151" title = "схема 8151">8151</a></td>
            <td><a href = "8157" title = "схема 8157">8157</a></td>
            <td><a href = "8164" title = "схема 8164">8164</a></td>
        </tr>
        <tr>
            <th>Для вольтметров</th>
            <td><a href = "8256" title = "схема 8256">8256</a></th>
            <td><a href = "8351" title = "схема 8351">8351</a></td>
            <td><a href = "8352" title = "схема 8352">8352</a></td>
            <td><a href = "8357" title = "схема 8357">8357</a></td>
            <td><a href = "8359" title = "схема 8359">8359</a></td>
            <td><a href = "8453" title = "схема 8453">8453</a></td>
            <td><a href = "8551" title = "схема 8551">8551</a></td>
            <td><a href = "8752" title = "схема 8752">8752</a></td>
        </tr>
        <tr>
            <th>Для однофазных двигателей</th>
            <td><a href = "9051" title = "схема 9051">9051</a></th>
            <td><a href = "9256" title = "схема 9256">9256</a></td>
            <td><a href = "9455" title = "схема 9455">9455</a></td>
            <td><a href = "94551" title = "схема 94551">94551</a></td>
            <td><a href = "94552" title = "схема 94552">94552</a></td>
            <td><a href = "9501" title = "схема 9501">9501</a></td>
            <td><a href = "95012" title = "схема 95012">95012</a></td>
            <td><a href = "91011" title = "схема 91011">91011</a></td>
            <td><a href = "91012" title = "схема 91012">91012</a></td>
        </tr>
        <tr>
            <th rowspan="2">Для трехфазных двигателей</th>
            <td><a href = "9151" title = "схема 9151">9151</a></th>
            <td><a href = "93521" title = "схема 93521">93521</a></td>
            <td><a href = "9551" title = "схема 9551">9551</a></td>
            <td><a href = "9153" title = "схема 9153">9153</a></td>
            <td><a href = "9354" title = "схема 9354">9354</a></td>
            <td><a href = "9552" title = "схема 9552">9552</a></td>
            <td><a href = "9154" title = "схема 9154">9154</a></td>
            <td><a href = "9554" title = "схема 9554">9554</a></td>
            <td><a href = "9555" title = "схема 9555">9555</a></td>
        </tr>
        <tr>

            <td><a href = "9556" title = "схема 9556">9556</a></th>
            <td><a href = "9567" title = "схема 9567">9567</a></td>
            <td><a href = "9553" title = "схема 9553">9553</a></td>
            <td><a href = "9557" title = "схема 9557">9557</a></td>
        </tr>
    </table>
</div>

    <a href = "#" ><img id="img7" onClick = "clicked('table7', 'img7');" style = "float: left;" src = "/images/plus.jpeg"  width = "30"></a>
    <a href = "#" class="schema" onClick = "clicked('table7', 'img7');" title = 'Нестандартные схемы переключателей'><h2>Нестандартные схемы</h2></a>
    <div id = "table7" style = "display: none;">

        <table class="schema" width="auto" border="1" align="center" cellpadding="4" cellspacing="0">
            <?php require_once "nostandartschemes.php";?>
        </table>
</div>

 <script type='text/javascript'>
document.getElementById("t1").style.display = "block";
</script>

</div>
 <div class="clear"></div>