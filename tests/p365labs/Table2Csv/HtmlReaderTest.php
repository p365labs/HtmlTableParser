<?php declare(strict_types=1);

namespace App\Tests\p365labs\Table2Csv;

use App\p365labs\Table2Csv\HtmlReader;
use PHPUnit\Framework\TestCase;

class HtmlReaderTest extends TestCase
{
    public function testSingleTableParsing()
    {
        $table = <<<EOT
<table cellspacing="1px" cellpadding="0" style="background-color:#e1e5e9">
						
							<tbody><tr>
								<th style="width:20%">Parameter</th>
								<th style="width:30%">Default value</th>
								<th style="width:50%">Description</th>
							</tr>
							<tr>
								<td>data</td>
								<td>-</td>
								<td>array contains data from HTML table</td>
							</tr>
							<tr>
								<td>rootName</td>
								<td>table</td>
								<td>root name of the XML document</td>
							</tr>
							<tr>
								<td>columnName</td>
								<td>null</td>
								<td>array conatains headers (name of cells)</td>
							</tr>
							<tr>
								<td>inputEncoding</td>
								<td>UTF-8</td>
								<td>input encoding</td>
							</tr>
							<tr>
								<td>outputEncoding</td>
								<td>UTF-8</td>
								<td>encoding XML document</td>
							</tr>
							
						</tbody></table>
EOT;

        $csv = <<<EOT
Parameter,Default value,Description
data,-,array contains data from HTML table
rootName,table,root name of the XML document
columnName,null,array conatains headers (name of cells)
inputEncoding,UTF-8,input encoding
outputEncoding,UTF-8,encoding XML document
EOT;


        $htmlReader = new HtmlReader();
        $table2csv = $htmlReader->load($table);

        $this->assertEquals($csv, $table2csv);
    }

    public function testMultipleTablesParsing()
    {
//        $this->markTestIncomplete('This test need to wait for Strategy pattern implementation');
        $table = <<<EOT
<table cellspacing="1px" cellpadding="0" id="test01" style="background-color:#e1e5e9">
						
							<tbody><tr>
								<th style="width:20%">Parameter</th>
								<th style="width:30%">Default value</th>
								<th style="width:50%">Description</th>
							</tr>
							<tr>
								<td>data</td>
								<td>-</td>
								<td>array contains data from HTML table</td>
							</tr>
							<tr>
								<td>rootName</td>
								<td>table</td>
								<td>root name of the XML document</td>
							</tr>
							<tr>
								<td>columnName</td>
								<td>null</td>
								<td>array conatains headers (name of cells)</td>
							</tr>
							<tr>
								<td>inputEncoding</td>
								<td>UTF-8</td>
								<td>input encoding</td>
							</tr>
							<tr>
								<td>outputEncoding</td>
								<td>UTF-8</td>
								<td>encoding XML document</td>
							</tr>
							
						</tbody></table>
<table cellspacing="1px" cellpadding="0" id="test02"  style="background-color:#e1e5e9">
						
							<tbody><tr>
								<th style="width:20%">Parameter</th>
								<th style="width:30%">Default value</th>
								<th style="width:50%">Description</th>
							</tr>
							<tr>
								<td>data</td>
								<td>-</td>
								<td>array contains data from HTML table</td>
							</tr>
							<tr>
								<td>rootName</td>
								<td>table</td>
								<td>root name of the XML document</td>
							</tr>
							<tr>
								<td>columnName</td>
								<td>null</td>
								<td>array conatains headers (name of cells)</td>
							</tr>
							<tr>
								<td>inputEncoding</td>
								<td>UTF-8</td>
								<td>input encoding</td>
							</tr>
							<tr>
								<td>outputEncoding</td>
								<td>UTF-8</td>
								<td>encoding XML document</td>
							</tr>
							
						</tbody></table>
EOT;

        $csv = <<<EOT
Parameter,Default value,Description
data,-,array contains data from HTML table
rootName,table,root name of the XML document
columnName,null,array conatains headers (name of cells)
inputEncoding,UTF-8,input encoding
outputEncoding,UTF-8,encoding XML document
EOT;


        $htmlReader = new HtmlReader();
        $table2csv = $htmlReader->load($table);

        $this->assertEquals($csv, $table2csv);
    }

    public function testTableParsing()
    {
        $table = <<<EOT
<div style="overflow-y:scroll;height:300px">
						
							<table cellspacing="1px" cellpadding="0" style="background-color:#d1d5d9" class="example" id="table_2">
							
								<tbody><tr>
									<th>Column 1</th>
									<th>Column 2</th>
									<th>Column 3</th>
									<th>Column 4</th>
									<th>Column 5</th>
									<th>Column 6</th>
									<th>Column 7</th>
									<th>Column 8</th>
									<th>Column 9</th>
									<th>Column 10</th>
								</tr>
<tr><td>1279</td><td>365</td><td>7599</td><td>9716</td><td>3416</td><td>9512</td><td>2691</td><td>5991</td><td>2502</td><td>5165</td></tr><tr><td>2050</td><td>1162</td><td>1024</td><td>4386</td><td>7500</td><td>4742</td><td>9196</td><td>8895</td><td>2616</td><td>5158</td></tr><tr><td>1311</td><td>2141</td><td>3143</td><td>929</td><td>7847</td><td>6935</td><td>8026</td><td>5236</td><td>2785</td><td>688</td></tr><tr><td>1003</td><td>4063</td><td>1052</td><td>8601</td><td>3778</td><td>4467</td><td>8113</td><td>6469</td><td>458</td><td>614</td></tr><tr><td>1633</td><td>2507</td><td>1775</td><td>2657</td><td>6893</td><td>9275</td><td>7398</td><td>6088</td><td>8169</td><td>14</td></tr><tr><td>1246</td><td>9479</td><td>2155</td><td>4388</td><td>407</td><td>2</td><td>1323</td><td>8433</td><td>5237</td><td>4107</td></tr><tr><td>9120</td><td>6239</td><td>8169</td><td>171</td><td>4840</td><td>1947</td><td>4638</td><td>2953</td><td>8415</td><td>5095</td></tr><tr><td>3566</td><td>48</td><td>7601</td><td>5341</td><td>2704</td><td>4494</td><td>4615</td><td>102</td><td>582</td><td>2783</td></tr><tr><td>115</td><td>1827</td><td>2261</td><td>2270</td><td>6215</td><td>2668</td><td>2271</td><td>7537</td><td>1100</td><td>7508</td></tr><tr><td>1643</td><td>219</td><td>3747</td><td>9812</td><td>390</td><td>8587</td><td>1758</td><td>5027</td><td>1539</td><td>172</td></tr><tr><td>121</td><td>5104</td><td>220</td><td>7722</td><td>445</td><td>2923</td><td>2215</td><td>5059</td><td>3024</td><td>2796</td></tr><tr><td>7842</td><td>3139</td><td>4623</td><td>103</td><td>5408</td><td>837</td><td>2770</td><td>7679</td><td>8374</td><td>3870</td></tr><tr><td>5186</td><td>16</td><td>4088</td><td>8932</td><td>9828</td><td>4478</td><td>7518</td><td>1585</td><td>9504</td><td>9057</td></tr><tr><td>1757</td><td>9624</td><td>4160</td><td>1976</td><td>7346</td><td>4604</td><td>4898</td><td>9560</td><td>9663</td><td>7922</td></tr><tr><td>2356</td><td>7505</td><td>1060</td><td>6978</td><td>7607</td><td>6468</td><td>7815</td><td>376</td><td>4147</td><td>6188</td></tr><tr><td>4245</td><td>9332</td><td>6204</td><td>8333</td><td>8264</td><td>6031</td><td>2810</td><td>5782</td><td>7615</td><td>2314</td></tr><tr><td>4838</td><td>9371</td><td>1937</td><td>8998</td><td>1347</td><td>9282</td><td>3602</td><td>6244</td><td>8842</td><td>3265</td></tr><tr><td>4166</td><td>1197</td><td>769</td><td>5226</td><td>8175</td><td>8375</td><td>1693</td><td>5989</td><td>8751</td><td>5839</td></tr><tr><td>2176</td><td>2996</td><td>5171</td><td>8379</td><td>1329</td><td>3434</td><td>4409</td><td>4138</td><td>9216</td><td>2024</td></tr><tr><td>6451</td><td>4054</td><td>1395</td><td>8388</td><td>3051</td><td>2741</td><td>7670</td><td>6652</td><td>8984</td><td>6512</td></tr><tr><td>9916</td><td>3150</td><td>7708</td><td>685</td><td>8375</td><td>5883</td><td>9059</td><td>67</td><td>1871</td><td>7809</td></tr><tr><td>5906</td><td>4047</td><td>805</td><td>1077</td><td>2426</td><td>2133</td><td>4510</td><td>6835</td><td>6271</td><td>3726</td></tr><tr><td>8858</td><td>2722</td><td>7779</td><td>252</td><td>1109</td><td>830</td><td>2992</td><td>8779</td><td>7481</td><td>1976</td></tr><tr><td>5290</td><td>7397</td><td>5125</td><td>2998</td><td>8081</td><td>3499</td><td>8881</td><td>7140</td><td>3566</td><td>751</td></tr><tr><td>4949</td><td>9471</td><td>4798</td><td>5753</td><td>547</td><td>7223</td><td>7885</td><td>5057</td><td>4057</td><td>4155</td></tr><tr><td>8783</td><td>2914</td><td>6876</td><td>6561</td><td>3166</td><td>7985</td><td>7390</td><td>6157</td><td>6763</td><td>4871</td></tr><tr><td>8133</td><td>2053</td><td>2268</td><td>3257</td><td>5051</td><td>349</td><td>6756</td><td>3931</td><td>7488</td><td>321</td></tr><tr><td>4682</td><td>2436</td><td>9792</td><td>9479</td><td>8189</td><td>339</td><td>6702</td><td>6073</td><td>5396</td><td>758</td></tr><tr><td>227</td><td>4178</td><td>3672</td><td>7103</td><td>739</td><td>6838</td><td>5087</td><td>8129</td><td>2995</td><td>1850</td></tr><tr><td>3000</td><td>1127</td><td>3903</td><td>5267</td><td>4384</td><td>8953</td><td>5615</td><td>1139</td><td>2884</td><td>3103</td></tr><tr><td>1460</td><td>7565</td><td>5539</td><td>1252</td><td>7044</td><td>3727</td><td>1590</td><td>3745</td><td>9800</td><td>6985</td></tr><tr><td>4503</td><td>26</td><td>1163</td><td>8175</td><td>7129</td><td>1901</td><td>5012</td><td>2215</td><td>30</td><td>8007</td></tr><tr><td>4065</td><td>3029</td><td>9133</td><td>7967</td><td>8295</td><td>3517</td><td>6920</td><td>3910</td><td>4656</td><td>9803</td></tr><tr><td>7013</td><td>6115</td><td>7367</td><td>2551</td><td>7366</td><td>4410</td><td>6278</td><td>8956</td><td>8155</td><td>6077</td></tr><tr><td>5941</td><td>2657</td><td>6103</td><td>7103</td><td>832</td><td>3232</td><td>9004</td><td>5843</td><td>5446</td><td>9033</td></tr><tr><td>3849</td><td>9511</td><td>2062</td><td>2982</td><td>7478</td><td>356</td><td>6498</td><td>4397</td><td>4266</td><td>1154</td></tr><tr><td>4199</td><td>1279</td><td>7268</td><td>1566</td><td>3830</td><td>4634</td><td>5975</td><td>107</td><td>3589</td><td>4130</td></tr><tr><td>6184</td><td>9529</td><td>6786</td><td>2287</td><td>6632</td><td>7617</td><td>5518</td><td>5636</td><td>3460</td><td>964</td></tr><tr><td>4668</td><td>7309</td><td>474</td><td>6730</td><td>290</td><td>7951</td><td>7085</td><td>6788</td><td>2347</td><td>1351</td></tr><tr><td>7941</td><td>6546</td><td>2629</td><td>5209</td><td>8111</td><td>6458</td><td>9843</td><td>4086</td><td>6565</td><td>3431</td></tr><tr><td>8215</td><td>2748</td><td>2960</td><td>5000</td><td>5034</td><td>9592</td><td>2617</td><td>551</td><td>5227</td><td>6077</td></tr><tr><td>1514</td><td>9895</td><td>3385</td><td>1988</td><td>6624</td><td>3675</td><td>9938</td><td>3709</td><td>463</td><td>2285</td></tr><tr><td>5060</td><td>8404</td><td>8830</td><td>7688</td><td>3612</td><td>6940</td><td>4146</td><td>3454</td><td>1025</td><td>710</td></tr><tr><td>6885</td><td>9240</td><td>3458</td><td>9845</td><td>4239</td><td>8491</td><td>9436</td><td>6856</td><td>9042</td><td>4663</td></tr><tr><td>2932</td><td>556</td><td>4557</td><td>6317</td><td>2543</td><td>1181</td><td>9992</td><td>2481</td><td>4889</td><td>454</td></tr><tr><td>4766</td><td>9949</td><td>8857</td><td>3596</td><td>7636</td><td>2469</td><td>536</td><td>1781</td><td>5923</td><td>1561</td></tr><tr><td>2491</td><td>2808</td><td>800</td><td>5948</td><td>2652</td><td>5038</td><td>4439</td><td>2088</td><td>1894</td><td>3481</td></tr><tr><td>6751</td><td>4826</td><td>4036</td><td>1308</td><td>1142</td><td>6579</td><td>2488</td><td>1133</td><td>9060</td><td>7377</td></tr><tr><td>1587</td><td>3825</td><td>7325</td><td>444</td><td>7420</td><td>4961</td><td>2913</td><td>7956</td><td>6741</td><td>8835</td></tr><tr><td>9516</td><td>9232</td><td>1643</td><td>315</td><td>5179</td><td>4295</td><td>5353</td><td>9618</td><td>6382</td><td>7246</td></tr><tr><td>3098</td><td>3133</td><td>2071</td><td>7133</td><td>4440</td><td>3213</td><td>3712</td><td>6927</td><td>4346</td><td>2771</td></tr><tr><td>4303</td><td>5932</td><td>6596</td><td>1628</td><td>6375</td><td>4016</td><td>6588</td><td>9287</td><td>1971</td><td>3329</td></tr><tr><td>8122</td><td>1486</td><td>2560</td><td>9764</td><td>1800</td><td>7739</td><td>4058</td><td>7153</td><td>7356</td><td>440</td></tr><tr><td>4398</td><td>453</td><td>3572</td><td>6469</td><td>7586</td><td>8011</td><td>9681</td><td>1297</td><td>4938</td><td>4026</td></tr><tr><td>4068</td><td>9241</td><td>9958</td><td>664</td><td>868</td><td>6332</td><td>4680</td><td>7456</td><td>5619</td><td>6650</td></tr><tr><td>784</td><td>3740</td><td>8136</td><td>3344</td><td>3504</td><td>9936</td><td>1082</td><td>7562</td><td>7088</td><td>8438</td></tr><tr><td>8001</td><td>1486</td><td>8890</td><td>1573</td><td>7954</td><td>6476</td><td>9584</td><td>7635</td><td>7772</td><td>4521</td></tr><tr><td>1661</td><td>1840</td><td>3761</td><td>1618</td><td>2504</td><td>4629</td><td>7950</td><td>7183</td><td>2084</td><td>3568</td></tr><tr><td>3833</td><td>2868</td><td>7308</td><td>1968</td><td>6211</td><td>811</td><td>1904</td><td>7293</td><td>8372</td><td>8991</td></tr><tr><td>5730</td><td>6373</td><td>477</td><td>4620</td><td>7945</td><td>8430</td><td>1095</td><td>7528</td><td>6065</td><td>8867</td></tr><tr><td>2049</td><td>7725</td><td>706</td><td>5810</td><td>9342</td><td>3209</td><td>439</td><td>7291</td><td>392</td><td>2522</td></tr><tr><td>859</td><td>4224</td><td>5390</td><td>8166</td><td>6191</td><td>1601</td><td>8976</td><td>8095</td><td>8894</td><td>7348</td></tr><tr><td>7085</td><td>4623</td><td>3720</td><td>7562</td><td>9242</td><td>1664</td><td>5991</td><td>337</td><td>9192</td><td>2056</td></tr><tr><td>9203</td><td>1241</td><td>9780</td><td>9908</td><td>7050</td><td>9122</td><td>3117</td><td>7488</td><td>6412</td><td>3508</td></tr><tr><td>10</td><td>7271</td><td>7732</td><td>5400</td><td>5436</td><td>3923</td><td>7000</td><td>4411</td><td>2017</td><td>5893</td></tr><tr><td>1759</td><td>9102</td><td>516</td><td>5478</td><td>6663</td><td>9758</td><td>7142</td><td>2654</td><td>94</td><td>6334</td></tr><tr><td>4709</td><td>9296</td><td>7574</td><td>4488</td><td>9204</td><td>4623</td><td>3609</td><td>2320</td><td>2111</td><td>21</td></tr><tr><td>5828</td><td>2120</td><td>7291</td><td>3560</td><td>7519</td><td>2727</td><td>7482</td><td>4519</td><td>7138</td><td>9498</td></tr><tr><td>411</td><td>8896</td><td>8599</td><td>927</td><td>4373</td><td>5261</td><td>684</td><td>1515</td><td>7914</td><td>777</td></tr><tr><td>7848</td><td>2623</td><td>72</td><td>5421</td><td>7110</td><td>9275</td><td>44</td><td>719</td><td>1595</td><td>2154</td></tr><tr><td>739</td><td>7423</td><td>4273</td><td>8030</td><td>982</td><td>1792</td><td>756</td><td>8464</td><td>6310</td><td>7893</td></tr><tr><td>7961</td><td>6721</td><td>6789</td><td>6560</td><td>7647</td><td>1161</td><td>1821</td><td>8330</td><td>2675</td><td>9735</td></tr><tr><td>9107</td><td>522</td><td>2357</td><td>9178</td><td>5943</td><td>9466</td><td>8453</td><td>5986</td><td>185</td><td>48</td></tr><tr><td>8139</td><td>923</td><td>7470</td><td>2412</td><td>8953</td><td>8452</td><td>4203</td><td>9709</td><td>6915</td><td>513</td></tr><tr><td>7602</td><td>4876</td><td>7233</td><td>4390</td><td>1435</td><td>4879</td><td>5550</td><td>3255</td><td>3209</td><td>8225</td></tr><tr><td>2990</td><td>2315</td><td>8747</td><td>5346</td><td>1493</td><td>4689</td><td>4812</td><td>9946</td><td>674</td><td>4996</td></tr><tr><td>9993</td><td>8813</td><td>5919</td><td>7463</td><td>1224</td><td>4871</td><td>5915</td><td>5427</td><td>4580</td><td>2829</td></tr><tr><td>5939</td><td>2181</td><td>7705</td><td>3171</td><td>6570</td><td>9139</td><td>8050</td><td>2120</td><td>2394</td><td>1259</td></tr><tr><td>345</td><td>5384</td><td>3573</td><td>9091</td><td>729</td><td>5066</td><td>3779</td><td>5540</td><td>5011</td><td>4453</td></tr><tr><td>536</td><td>5004</td><td>3266</td><td>6454</td><td>2466</td><td>4489</td><td>1325</td><td>8381</td><td>9915</td><td>5904</td></tr><tr><td>1210</td><td>5853</td><td>8085</td><td>8914</td><td>9024</td><td>4654</td><td>8053</td><td>7073</td><td>6774</td><td>447</td></tr><tr><td>8331</td><td>7118</td><td>5830</td><td>1904</td><td>6208</td><td>6558</td><td>6970</td><td>9987</td><td>2098</td><td>1981</td></tr><tr><td>4440</td><td>2634</td><td>6984</td><td>7705</td><td>9087</td><td>9450</td><td>2194</td><td>412</td><td>7830</td><td>2109</td></tr><tr><td>6316</td><td>9039</td><td>7961</td><td>4400</td><td>7953</td><td>6985</td><td>9054</td><td>6005</td><td>4058</td><td>5827</td></tr><tr><td>6451</td><td>2389</td><td>2945</td><td>2280</td><td>4292</td><td>9153</td><td>8838</td><td>1262</td><td>9140</td><td>936</td></tr><tr><td>3242</td><td>3580</td><td>3569</td><td>225</td><td>1285</td><td>2655</td><td>9674</td><td>3478</td><td>3066</td><td>7504</td></tr><tr><td>5586</td><td>9382</td><td>6542</td><td>3547</td><td>3781</td><td>4494</td><td>531</td><td>2835</td><td>499</td><td>4588</td></tr><tr><td>8662</td><td>6949</td><td>6976</td><td>1606</td><td>9229</td><td>1268</td><td>759</td><td>8066</td><td>2529</td><td>9898</td></tr><tr><td>9001</td><td>5770</td><td>3477</td><td>2569</td><td>5995</td><td>4761</td><td>5224</td><td>5668</td><td>8239</td><td>8290</td></tr><tr><td>3172</td><td>3824</td><td>7671</td><td>9714</td><td>7370</td><td>1452</td><td>4208</td><td>7901</td><td>4286</td><td>4706</td></tr><tr><td>2488</td><td>2947</td><td>1655</td><td>9463</td><td>4552</td><td>883</td><td>731</td><td>5310</td><td>8948</td><td>3259</td></tr><tr><td>5208</td><td>7949</td><td>9029</td><td>8685</td><td>518</td><td>5023</td><td>3445</td><td>5741</td><td>691</td><td>1683</td></tr><tr><td>4031</td><td>3862</td><td>5507</td><td>1701</td><td>3575</td><td>2877</td><td>3152</td><td>7783</td><td>777</td><td>7437</td></tr><tr><td>2488</td><td>3264</td><td>384</td><td>4142</td><td>2727</td><td>4935</td><td>5024</td><td>3457</td><td>245</td><td>3972</td></tr><tr><td>6716</td><td>5452</td><td>1921</td><td>5744</td><td>4137</td><td>2438</td><td>767</td><td>7581</td><td>8179</td><td>1457</td></tr><tr><td>9264</td><td>2209</td><td>5319</td><td>4771</td><td>3909</td><td>8894</td><td>7647</td><td>7061</td><td>6676</td><td>8423</td></tr><tr><td>4498</td><td>9163</td><td>1687</td><td>4881</td><td>3305</td><td>4413</td><td>9816</td><td>8329</td><td>7870</td><td>60</td></tr><tr><td>2300</td><td>4586</td><td>5512</td><td>4221</td><td>330</td><td>9648</td><td>6658</td><td>1096</td><td>7229</td><td>4836</td></tr><tr><td>2553</td><td>6493</td><td>7044</td><td>7872</td><td>1263</td><td>953</td><td>6765</td><td>8909</td><td>8013</td><td>3441</td></tr><tr><td>7332</td><td>2511</td><td>2604</td><td>9018</td><td>7391</td><td>5908</td><td>3431</td><td>7206</td><td>4236</td><td>1301</td></tr><tr><td>7266</td><td>6536</td><td>5886</td><td>2778</td><td>756</td><td>6215</td><td>2426</td><td>7414</td><td>7311</td><td>9655</td></tr><tr><td>2249</td><td>9863</td><td>6147</td><td>9293</td><td>7734</td><td>7410</td><td>245</td><td>4499</td><td>6318</td><td>8258</td></tr><tr><td>7939</td><td>3650</td><td>768</td><td>542</td><td>2667</td><td>8159</td><td>6450</td><td>6098</td><td>5365</td><td>685</td></tr><tr><td>7398</td><td>2631</td><td>7221</td><td>3283</td><td>5408</td><td>7976</td><td>9498</td><td>7834</td><td>5389</td><td>6809</td></tr><tr><td>7488</td><td>7638</td><td>6671</td><td>3634</td><td>6930</td><td>4405</td><td>1044</td><td>7175</td><td>8904</td><td>7362</td></tr><tr><td>5433</td><td>6842</td><td>1011</td><td>6201</td><td>7384</td><td>3678</td><td>4359</td><td>3833</td><td>9775</td><td>9723</td></tr><tr><td>4518</td><td>7172</td><td>2353</td><td>1738</td><td>455</td><td>7761</td><td>9713</td><td>9953</td><td>5594</td><td>5102</td></tr><tr><td>6761</td><td>3082</td><td>2739</td><td>3432</td><td>6716</td><td>9669</td><td>7836</td><td>7759</td><td>6843</td><td>6740</td></tr><tr><td>5120</td><td>2275</td><td>3581</td><td>6130</td><td>8476</td><td>965</td><td>9807</td><td>2834</td><td>4797</td><td>9581</td></tr><tr><td>2557</td><td>9314</td><td>6753</td><td>4910</td><td>1052</td><td>7208</td><td>2671</td><td>764</td><td>7160</td><td>8265</td></tr><tr><td>5865</td><td>3920</td><td>1346</td><td>8604</td><td>7351</td><td>8061</td><td>8272</td><td>5187</td><td>5820</td><td>5115</td></tr><tr><td>1926</td><td>939</td><td>7390</td><td>5507</td><td>7069</td><td>5865</td><td>6472</td><td>6875</td><td>8698</td><td>1268</td></tr><tr><td>6456</td><td>1255</td><td>582</td><td>3208</td><td>6165</td><td>1634</td><td>416</td><td>8835</td><td>2397</td><td>7575</td></tr><tr><td>7099</td><td>8262</td><td>1494</td><td>8444</td><td>6866</td><td>8845</td><td>6505</td><td>5137</td><td>4031</td><td>2324</td></tr><tr><td>252</td><td>5957</td><td>3263</td><td>7641</td><td>1464</td><td>331</td><td>3505</td><td>7935</td><td>7205</td><td>2203</td></tr><tr><td>9203</td><td>3661</td><td>3458</td><td>9785</td><td>6869</td><td>9622</td><td>1418</td><td>7284</td><td>8456</td><td>3815</td></tr><tr><td>4858</td><td>5555</td><td>2076</td><td>6352</td><td>3999</td><td>8942</td><td>5196</td><td>503</td><td>4078</td><td>9227</td></tr><tr><td>2827</td><td>4330</td><td>5183</td><td>6089</td><td>1970</td><td>6647</td><td>6419</td><td>5475</td><td>4581</td><td>3624</td></tr><tr><td>7677</td><td>3783</td><td>7284</td><td>1134</td><td>3568</td><td>4153</td><td>756</td><td>4985</td><td>1436</td><td>9211</td></tr><tr><td>8799</td><td>6293</td><td>4765</td><td>875</td><td>2645</td><td>8764</td><td>9816</td><td>7840</td><td>9266</td><td>3894</td></tr><tr><td>7067</td><td>2093</td><td>8223</td><td>2250</td><td>8182</td><td>192</td><td>8896</td><td>4600</td><td>5666</td><td>3476</td></tr><tr><td>8224</td><td>3343</td><td>7259</td><td>5508</td><td>4477</td><td>826</td><td>9660</td><td>5232</td><td>5811</td><td>1095</td></tr><tr><td>4443</td><td>4609</td><td>7388</td><td>9208</td><td>5483</td><td>32</td><td>7971</td><td>5298</td><td>7872</td><td>7237</td></tr><tr><td>9192</td><td>4938</td><td>9329</td><td>7414</td><td>7187</td><td>7510</td><td>7606</td><td>6082</td><td>2110</td><td>3272</td></tr><tr><td>9558</td><td>334</td><td>6614</td><td>6817</td><td>5841</td><td>1091</td><td>7643</td><td>5500</td><td>6322</td><td>3453</td></tr><tr><td>6595</td><td>764</td><td>8061</td><td>3983</td><td>9972</td><td>3544</td><td>4014</td><td>7942</td><td>8842</td><td>1886</td></tr><tr><td>5178</td><td>8033</td><td>6823</td><td>4506</td><td>5446</td><td>4009</td><td>2016</td><td>3052</td><td>91</td><td>4126</td></tr><tr><td>6323</td><td>9649</td><td>4459</td><td>2937</td><td>6465</td><td>299</td><td>4027</td><td>4107</td><td>5799</td><td>349</td></tr><tr><td>7559</td><td>2394</td><td>1113</td><td>5620</td><td>6376</td><td>1084</td><td>9163</td><td>390</td><td>9025</td><td>8004</td></tr><tr><td>2275</td><td>4202</td><td>6036</td><td>9097</td><td>8708</td><td>1482</td><td>3106</td><td>724</td><td>4533</td><td>3197</td></tr><tr><td>4850</td><td>855</td><td>2845</td><td>9308</td><td>3792</td><td>9309</td><td>9607</td><td>7818</td><td>3416</td><td>5406</td></tr><tr><td>8166</td><td>974</td><td>7799</td><td>9278</td><td>6593</td><td>4174</td><td>361</td><td>5755</td><td>4564</td><td>9386</td></tr><tr><td>3759</td><td>6838</td><td>3588</td><td>9794</td><td>5935</td><td>2296</td><td>1276</td><td>9040</td><td>3019</td><td>5808</td></tr><tr><td>2236</td><td>7868</td><td>6663</td><td>5080</td><td>7176</td><td>454</td><td>4389</td><td>6782</td><td>8272</td><td>7804</td></tr><tr><td>2188</td><td>6437</td><td>8778</td><td>9986</td><td>5715</td><td>5371</td><td>4160</td><td>6076</td><td>1126</td><td>8723</td></tr><tr><td>5462</td><td>4884</td><td>5561</td><td>9049</td><td>4678</td><td>1495</td><td>1344</td><td>5953</td><td>534</td><td>4363</td></tr><tr><td>1761</td><td>2770</td><td>2231</td><td>8424</td><td>7849</td><td>9407</td><td>8878</td><td>2238</td><td>6188</td><td>7149</td></tr><tr><td>41</td><td>8376</td><td>3586</td><td>8819</td><td>8361</td><td>9300</td><td>4189</td><td>2521</td><td>5376</td><td>5314</td></tr><tr><td>1244</td><td>837</td><td>197</td><td>6804</td><td>9885</td><td>4875</td><td>8298</td><td>1229</td><td>828</td><td>8832</td></tr><tr><td>5592</td><td>2588</td><td>1601</td><td>7822</td><td>1012</td><td>9450</td><td>7228</td><td>9889</td><td>1687</td><td>3416</td></tr><tr><td>7037</td><td>1728</td><td>1791</td><td>623</td><td>547</td><td>152</td><td>9922</td><td>4735</td><td>2672</td><td>5298</td></tr><tr><td>48</td><td>3915</td><td>6134</td><td>245</td><td>719</td><td>6019</td><td>5120</td><td>9017</td><td>7248</td><td>5947</td></tr><tr><td>7848</td><td>2839</td><td>8534</td><td>9449</td><td>661</td><td>9545</td><td>8898</td><td>7888</td><td>9434</td><td>585</td></tr><tr><td>1304</td><td>6471</td><td>2313</td><td>3095</td><td>7093</td><td>2859</td><td>3246</td><td>7014</td><td>7594</td><td>5918</td></tr><tr><td>2312</td><td>7642</td><td>9833</td><td>8445</td><td>7887</td><td>551</td><td>4464</td><td>3006</td><td>9567</td><td>1711</td></tr><tr><td>8952</td><td>7415</td><td>4549</td><td>7486</td><td>6863</td><td>5209</td><td>7031</td><td>5761</td><td>3097</td><td>6464</td></tr><tr><td>6345</td><td>4400</td><td>2934</td><td>8658</td><td>7494</td><td>26</td><td>1517</td><td>740</td><td>7040</td><td>9110</td></tr><tr><td>6657</td><td>9351</td><td>6751</td><td>6489</td><td>7796</td><td>4637</td><td>7040</td><td>2259</td><td>7642</td><td>6607</td></tr><tr><td>3969</td><td>6594</td><td>4021</td><td>8518</td><td>4079</td><td>883</td><td>3727</td><td>1109</td><td>6644</td><td>6823</td></tr><tr><td>7572</td><td>2989</td><td>1223</td><td>505</td><td>1646</td><td>8717</td><td>531</td><td>3162</td><td>9456</td><td>7570</td></tr><tr><td>2271</td><td>6113</td><td>6921</td><td>9022</td><td>2602</td><td>4716</td><td>3659</td><td>9641</td><td>6975</td><td>1300</td></tr><tr><td>6247</td><td>944</td><td>7893</td><td>268</td><td>9461</td><td>1972</td><td>1151</td><td>3187</td><td>3080</td><td>7794</td></tr><tr><td>10</td><td>651</td><td>782</td><td>1232</td><td>1156</td><td>2427</td><td>9948</td><td>1687</td><td>5589</td><td>9404</td></tr><tr><td>9256</td><td>7860</td><td>5516</td><td>6177</td><td>6881</td><td>8117</td><td>892</td><td>539</td><td>7758</td><td>7866</td></tr><tr><td>1839</td><td>4005</td><td>8809</td><td>9732</td><td>4272</td><td>8270</td><td>1703</td><td>5422</td><td>1457</td><td>4782</td></tr><tr><td>3215</td><td>1466</td><td>5433</td><td>3997</td><td>2697</td><td>6589</td><td>6423</td><td>2645</td><td>8275</td><td>2012</td></tr><tr><td>2048</td><td>7531</td><td>9871</td><td>7564</td><td>3707</td><td>6751</td><td>5681</td><td>4598</td><td>7290</td><td>3438</td></tr><tr><td>2464</td><td>9128</td><td>7443</td><td>1273</td><td>8859</td><td>1714</td><td>9542</td><td>561</td><td>7136</td><td>999</td></tr><tr><td>5343</td><td>351</td><td>2464</td><td>775</td><td>4347</td><td>5161</td><td>7364</td><td>770</td><td>7806</td><td>5638</td></tr><tr><td>2781</td><td>9854</td><td>3168</td><td>2651</td><td>7417</td><td>6874</td><td>9402</td><td>3098</td><td>1472</td><td>6691</td></tr><tr><td>6535</td><td>3935</td><td>5818</td><td>3978</td><td>5208</td><td>4677</td><td>5691</td><td>4750</td><td>5238</td><td>2827</td></tr><tr><td>5748</td><td>581</td><td>3177</td><td>8211</td><td>1355</td><td>7524</td><td>3372</td><td>8718</td><td>8293</td><td>1177</td></tr><tr><td>4356</td><td>1073</td><td>1030</td><td>7523</td><td>3724</td><td>8446</td><td>4397</td><td>3125</td><td>1543</td><td>5868</td></tr><tr><td>9815</td><td>8078</td><td>9803</td><td>5633</td><td>2056</td><td>5010</td><td>310</td><td>7747</td><td>9759</td><td>5548</td></tr><tr><td>573</td><td>5506</td><td>6128</td><td>3749</td><td>3717</td><td>7483</td><td>1273</td><td>7088</td><td>6201</td><td>9565</td></tr><tr><td>8265</td><td>556</td><td>637</td><td>9294</td><td>8079</td><td>4361</td><td>7740</td><td>2475</td><td>7485</td><td>9283</td></tr><tr><td>8342</td><td>7300</td><td>7361</td><td>8145</td><td>2933</td><td>9416</td><td>3154</td><td>3243</td><td>7162</td><td>2912</td></tr><tr><td>8790</td><td>7734</td><td>8418</td><td>4917</td><td>1483</td><td>2134</td><td>2399</td><td>2755</td><td>9222</td><td>8600</td></tr><tr><td>2320</td><td>7486</td><td>9155</td><td>2957</td><td>6780</td><td>7233</td><td>7317</td><td>4519</td><td>9708</td><td>4802</td></tr><tr><td>3801</td><td>8050</td><td>2101</td><td>1162</td><td>6194</td><td>5034</td><td>577</td><td>9347</td><td>8276</td><td>7739</td></tr><tr><td>2259</td><td>7066</td><td>5473</td><td>677</td><td>1982</td><td>6956</td><td>2810</td><td>4381</td><td>9710</td><td>2032</td></tr><tr><td>2980</td><td>2030</td><td>9518</td><td>2135</td><td>4986</td><td>6297</td><td>9368</td><td>2302</td><td>815</td><td>9075</td></tr><tr><td>7104</td><td>4616</td><td>7124</td><td>9204</td><td>5777</td><td>3317</td><td>4238</td><td>6354</td><td>2664</td><td>2514</td></tr><tr><td>4092</td><td>4922</td><td>9579</td><td>9564</td><td>5598</td><td>1560</td><td>6519</td><td>8408</td><td>5941</td><td>6229</td></tr><tr><td>440</td><td>8921</td><td>8258</td><td>9957</td><td>1056</td><td>3243</td><td>6254</td><td>423</td><td>5545</td><td>7068</td></tr><tr><td>9498</td><td>2648</td><td>1684</td><td>6621</td><td>1852</td><td>7460</td><td>9938</td><td>6090</td><td>3813</td><td>2601</td></tr><tr><td>8603</td><td>7904</td><td>7523</td><td>8181</td><td>7467</td><td>3121</td><td>9741</td><td>3986</td><td>1529</td><td>5681</td></tr><tr><td>214</td><td>1969</td><td>4602</td><td>8471</td><td>1925</td><td>5657</td><td>1714</td><td>8179</td><td>6080</td><td>7259</td></tr><tr><td>5246</td><td>5577</td><td>9907</td><td>6929</td><td>2198</td><td>1758</td><td>4389</td><td>2135</td><td>7848</td><td>8202</td></tr><tr><td>4736</td><td>6450</td><td>6105</td><td>2259</td><td>4630</td><td>3572</td><td>5380</td><td>4370</td><td>7558</td><td>6908</td></tr><tr><td>51</td><td>7771</td><td>8877</td><td>4652</td><td>6242</td><td>802</td><td>309</td><td>7955</td><td>8980</td><td>6388</td></tr><tr><td>5214</td><td>4225</td><td>1965</td><td>5120</td><td>1154</td><td>4162</td><td>6878</td><td>5543</td><td>6297</td><td>4725</td></tr><tr><td>3744</td><td>1033</td><td>1174</td><td>9849</td><td>3291</td><td>5804</td><td>3421</td><td>8670</td><td>173</td><td>978</td></tr><tr><td>5578</td><td>224</td><td>8748</td><td>4454</td><td>4876</td><td>4990</td><td>5256</td><td>5185</td><td>2945</td><td>4235</td></tr><tr><td>1573</td><td>8158</td><td>8460</td><td>3537</td><td>3278</td><td>9613</td><td>7699</td><td>155</td><td>5156</td><td>3995</td></tr><tr><td>4880</td><td>8899</td><td>5027</td><td>6054</td><td>8747</td><td>8318</td><td>1857</td><td>2168</td><td>6988</td><td>2030</td></tr><tr><td>3145</td><td>2566</td><td>2253</td><td>1893</td><td>7020</td><td>7129</td><td>6882</td><td>2275</td><td>2313</td><td>9826</td></tr><tr><td>6509</td><td>3885</td><td>7983</td><td>4968</td><td>7421</td><td>1260</td><td>4581</td><td>5120</td><td>1415</td><td>9736</td></tr><tr><td>9114</td><td>6294</td><td>8635</td><td>4141</td><td>2348</td><td>7382</td><td>2459</td><td>4204</td><td>9549</td><td>9446</td></tr><tr><td>6234</td><td>2693</td><td>2012</td><td>8487</td><td>4585</td><td>9031</td><td>5615</td><td>1467</td><td>1306</td><td>7928</td></tr><tr><td>1292</td><td>7815</td><td>1812</td><td>9275</td><td>2783</td><td>9233</td><td>535</td><td>7363</td><td>4352</td><td>1949</td></tr><tr><td>7099</td><td>3466</td><td>8243</td><td>5733</td><td>7607</td><td>590</td><td>3114</td><td>65</td><td>4794</td><td>2662</td></tr><tr><td>9511</td><td>1027</td><td>5355</td><td>1522</td><td>9513</td><td>9939</td><td>553</td><td>5128</td><td>1405</td><td>1858</td></tr><tr><td>3055</td><td>2697</td><td>9673</td><td>4866</td><td>1971</td><td>2455</td><td>4099</td><td>2506</td><td>9817</td><td>8451</td></tr><tr><td>4454</td><td>6916</td><td>1916</td><td>2697</td><td>2649</td><td>9522</td><td>3287</td><td>5762</td><td>9587</td><td>8080</td></tr><tr><td>8424</td><td>9097</td><td>9107</td><td>3779</td><td>619</td><td>8620</td><td>3718</td><td>1171</td><td>3747</td><td>5123</td></tr><tr><td>3029</td><td>6801</td><td>7819</td><td>2701</td><td>1667</td><td>9790</td><td>5155</td><td>5765</td><td>2295</td><td>4972</td></tr><tr><td>4215</td><td>6749</td><td>1887</td><td>6131</td><td>9446</td><td>4536</td><td>5653</td><td>2732</td><td>298</td><td>5239</td></tr><tr><td>812</td><td>8722</td><td>4335</td><td>9918</td><td>2500</td><td>4953</td><td>8537</td><td>6217</td><td>6124</td><td>2284</td></tr><tr><td>1339</td><td>9153</td><td>9084</td><td>9158</td><td>1854</td><td>751</td><td>8947</td><td>7008</td><td>6516</td><td>1242</td></tr><tr><td>1980</td><td>731</td><td>7990</td><td>3867</td><td>6861</td><td>7435</td><td>8402</td><td>2513</td><td>167</td><td>8699</td></tr><tr><td>7751</td><td>978</td><td>7420</td><td>2086</td><td>896</td><td>9919</td><td>7038</td><td>9433</td><td>6136</td><td>3162</td></tr><tr><td>1716</td><td>7475</td><td>2314</td><td>800</td><td>6632</td><td>4167</td><td>1550</td><td>5579</td><td>1175</td><td>8065</td></tr><tr><td>6820</td><td>3155</td><td>8795</td><td>4810</td><td>7021</td><td>5656</td><td>2245</td><td>5423</td><td>8168</td><td>2411</td></tr><tr><td>4121</td><td>5919</td><td>3389</td><td>1541</td><td>8004</td><td>4284</td><td>1460</td><td>5042</td><td>3717</td><td>7595</td></tr><tr><td>8203</td><td>5432</td><td>5069</td><td>517</td><td>6231</td><td>1701</td><td>4684</td><td>7781</td><td>7279</td><td>5859</td></tr><tr><td>5846</td><td>4098</td><td>9013</td><td>4640</td><td>8908</td><td>6034</td><td>295</td><td>1152</td><td>1456</td><td>8463</td></tr><tr><td>3562</td><td>5577</td><td>4381</td><td>6951</td><td>7118</td><td>2385</td><td>1234</td><td>8577</td><td>7426</td><td>4950</td></tr><tr><td>6172</td><td>5629</td><td>382</td><td>1241</td><td>6146</td><td>6613</td><td>2941</td><td>830</td><td>4393</td><td>219</td></tr><tr><td>6688</td><td>238</td><td>4317</td><td>5701</td><td>4878</td><td>3224</td><td>1735</td><td>5173</td><td>4376</td><td>3190</td></tr><tr><td>3635</td><td>7937</td><td>8767</td><td>8016</td><td>4888</td><td>5884</td><td>400</td><td>6122</td><td>4461</td><td>7826</td></tr><tr><td>1072</td><td>633</td><td>3455</td><td>1453</td><td>1873</td><td>9600</td><td>8065</td><td>4813</td><td>429</td><td>2458</td></tr><tr><td>5032</td><td>7117</td><td>2695</td><td>9349</td><td>2817</td><td>7572</td><td>2573</td><td>4551</td><td>2745</td><td>6948</td></tr><tr><td>7741</td><td>6380</td><td>4885</td><td>6508</td><td>4395</td><td>9772</td><td>2392</td><td>4795</td><td>5893</td><td>6853</td></tr><tr><td>2621</td><td>6964</td><td>7485</td><td>6075</td><td>8417</td><td>9357</td><td>5674</td><td>6481</td><td>4170</td><td>6103</td></tr><tr><td>8939</td><td>9202</td><td>3219</td><td>1633</td><td>8550</td><td>6036</td><td>9205</td><td>1122</td><td>587</td><td>1949</td></tr><tr><td>8070</td><td>8328</td><td>8329</td><td>2954</td><td>4836</td><td>2723</td><td>2726</td><td>7227</td><td>7518</td><td>8618</td></tr><tr><td>4079</td><td>138</td><td>5582</td><td>1564</td><td>6212</td><td>3998</td><td>920</td><td>1886</td><td>479</td><td>5090</td></tr><tr><td>7989</td><td>9417</td><td>4291</td><td>1207</td><td>1050</td><td>2841</td><td>7243</td><td>255</td><td>3963</td><td>7829</td></tr><tr><td>2204</td><td>2032</td><td>6157</td><td>532</td><td>4986</td><td>992</td><td>3255</td><td>7711</td><td>8218</td><td>772</td></tr><tr><td>6329</td><td>2297</td><td>910</td><td>1911</td><td>3860</td><td>7122</td><td>5908</td><td>4780</td><td>9007</td><td>6387</td></tr><tr><td>9869</td><td>6995</td><td>5804</td><td>4159</td><td>8202</td><td>6854</td><td>6999</td><td>5444</td><td>7108</td><td>961</td></tr><tr><td>3273</td><td>9311</td><td>2993</td><td>9429</td><td>9842</td><td>7978</td><td>420</td><td>3096</td><td>5688</td><td>8638</td></tr><tr><td>3868</td><td>2017</td><td>934</td><td>4777</td><td>3927</td><td>4793</td><td>1898</td><td>9834</td><td>9573</td><td>905</td></tr><tr><td>6221</td><td>9441</td><td>7900</td><td>2025</td><td>3599</td><td>6102</td><td>8878</td><td>598</td><td>1546</td><td>5985</td></tr><tr><td>1558</td><td>4818</td><td>5295</td><td>4550</td><td>4247</td><td>5137</td><td>2528</td><td>4666</td><td>8233</td><td>8215</td></tr><tr><td>3304</td><td>2100</td><td>231</td><td>4237</td><td>6876</td><td>4158</td><td>9030</td><td>8774</td><td>3992</td><td>8602</td></tr><tr><td>9679</td><td>212</td><td>8042</td><td>7579</td><td>2236</td><td>1641</td><td>3681</td><td>1113</td><td>2238</td><td>5226</td></tr><tr><td>7098</td><td>3796</td><td>44</td><td>2392</td><td>8346</td><td>4290</td><td>7529</td><td>873</td><td>8956</td><td>5761</td></tr><tr><td>9088</td><td>2259</td><td>7860</td><td>9319</td><td>6495</td><td>4736</td><td>3476</td><td>5525</td><td>3510</td><td>7467</td></tr><tr><td>4127</td><td>3189</td><td>7679</td><td>2168</td><td>767</td><td>9915</td><td>3809</td><td>4447</td><td>1027</td><td>6046</td></tr><tr><td>9673</td><td>8125</td><td>9842</td><td>9716</td><td>517</td><td>8187</td><td>4005</td><td>8045</td><td>9060</td><td>2961</td></tr><tr><td>3805</td><td>8147</td><td>5219</td><td>1665</td><td>7466</td><td>1714</td><td>6401</td><td>941</td><td>7238</td><td>9910</td></tr><tr><td>8408</td><td>1365</td><td>3098</td><td>6086</td><td>3532</td><td>3865</td><td>6000</td><td>7341</td><td>8312</td><td>7027</td></tr><tr><td>3387</td><td>7984</td><td>5151</td><td>3228</td><td>7700</td><td>5667</td><td>1415</td><td>1705</td><td>3711</td><td>474</td></tr><tr><td>4665</td><td>7516</td><td>8621</td><td>9884</td><td>9181</td><td>6086</td><td>1597</td><td>5581</td><td>7026</td><td>8835</td></tr><tr><td>5491</td><td>5434</td><td>199</td><td>8589</td><td>1519</td><td>3731</td><td>2453</td><td>7518</td><td>1071</td><td>765</td></tr><tr><td>4544</td><td>4457</td><td>8748</td><td>9694</td><td>7684</td><td>6448</td><td>5361</td><td>9099</td><td>8152</td><td>9071</td></tr><tr><td>9572</td><td>2816</td><td>6587</td><td>8193</td><td>2699</td><td>5767</td><td>4278</td><td>4296</td><td>1348</td><td>1304</td></tr><tr><td>3130</td><td>6838</td><td>6737</td><td>3329</td><td>5426</td><td>8255</td><td>7059</td><td>7878</td><td>5773</td><td>8130</td></tr><tr><td>8642</td><td>317</td><td>2586</td><td>7390</td><td>10</td><td>270</td><td>3838</td><td>5371</td><td>9368</td><td>1989</td></tr><tr><td>4441</td><td>8940</td><td>4805</td><td>1028</td><td>7132</td><td>7504</td><td>6794</td><td>1410</td><td>1799</td><td>8142</td></tr><tr><td>2713</td><td>4929</td><td>4979</td><td>9450</td><td>8257</td><td>404</td><td>7705</td><td>5316</td><td>8282</td><td>3477</td></tr><tr><td>3445</td><td>6924</td><td>3793</td><td>6031</td><td>4313</td><td>3803</td><td>6300</td><td>8151</td><td>9173</td><td>5668</td></tr><tr><td>139</td><td>3614</td><td>4608</td><td>4943</td><td>4641</td><td>1739</td><td>2447</td><td>1435</td><td>3148</td><td>4245</td></tr><tr><td>9576</td><td>5861</td><td>9174</td><td>4554</td><td>5310</td><td>7431</td><td>4958</td><td>3015</td><td>2746</td><td>3239</td></tr><tr><td>6491</td><td>6191</td><td>162</td><td>284</td><td>2221</td><td>4475</td><td>4086</td><td>8521</td><td>2625</td><td>3259</td></tr><tr><td>4189</td><td>2764</td><td>6872</td><td>8796</td><td>7707</td><td>1513</td><td>534</td><td>153</td><td>2948</td><td>3682</td></tr><tr><td>4397</td><td>2523</td><td>9543</td><td>3571</td><td>7077</td><td>4853</td><td>1001</td><td>2035</td><td>7867</td><td>3746</td></tr><tr><td>5273</td><td>4358</td><td>9937</td><td>5435</td><td>4641</td><td>2157</td><td>9909</td><td>8727</td><td>678</td><td>2534</td></tr><tr><td>1985</td><td>4866</td><td>5297</td><td>8856</td><td>3661</td><td>3003</td><td>369</td><td>4195</td><td>3155</td><td>3316</td></tr><tr><td>7876</td><td>7552</td><td>5839</td><td>7419</td><td>1123</td><td>2916</td><td>2271</td><td>2123</td><td>4950</td><td>137</td></tr><tr><td>5869</td><td>223</td><td>4494</td><td>5805</td><td>5657</td><td>9135</td><td>7962</td><td>5566</td><td>7861</td><td>8639</td></tr><tr><td>8099</td><td>9845</td><td>3505</td><td>3396</td><td>8701</td><td>7165</td><td>6399</td><td>9069</td><td>1359</td><td>9554</td></tr><tr><td>2385</td><td>9235</td><td>7106</td><td>8223</td><td>6653</td><td>8228</td><td>1138</td><td>8923</td><td>350</td><td>6088</td></tr><tr><td>9060</td><td>6219</td><td>6310</td><td>3554</td><td>2023</td><td>1966</td><td>2688</td><td>9985</td><td>7532</td><td>549</td></tr><tr><td>8624</td><td>5631</td><td>393</td><td>2128</td><td>9026</td><td>9094</td><td>9292</td><td>5425</td><td>8163</td><td>651</td></tr><tr><td>4978</td><td>547</td><td>9885</td><td>2083</td><td>8769</td><td>6537</td><td>311</td><td>9907</td><td>5460</td><td>661</td></tr><tr><td>5994</td><td>4520</td><td>6879</td><td>2304</td><td>8074</td><td>8902</td><td>4269</td><td>762</td><td>8886</td><td>1800</td></tr><tr><td>1310</td><td>7510</td><td>7431</td><td>1703</td><td>9637</td><td>6456</td><td>796</td><td>8928</td><td>1881</td><td>8958</td></tr><tr><td>9579</td><td>6858</td><td>9505</td><td>9463</td><td>8941</td><td>8273</td><td>6000</td><td>9252</td><td>8180</td><td>1460</td></tr><tr><td>9912</td><td>4173</td><td>5979</td><td>6790</td><td>6477</td><td>4053</td><td>5691</td><td>745</td><td>4814</td><td>4577</td></tr><tr><td>2545</td><td>6124</td><td>2086</td><td>9975</td><td>7826</td><td>1722</td><td>6431</td><td>8622</td><td>650</td><td>8311</td></tr><tr><td>7580</td><td>228</td><td>5169</td><td>7084</td><td>9691</td><td>4110</td><td>5357</td><td>5690</td><td>3361</td><td>3536</td></tr><tr><td>7150</td><td>3272</td><td>7709</td><td>3129</td><td>62</td><td>4185</td><td>7181</td><td>5752</td><td>4930</td><td>1995</td></tr><tr><td>329</td><td>7475</td><td>8118</td><td>2415</td><td>7450</td><td>5944</td><td>4137</td><td>3881</td><td>4566</td><td>4787</td></tr><tr><td>2191</td><td>2146</td><td>5015</td><td>7360</td><td>9229</td><td>4705</td><td>1470</td><td>4586</td><td>395</td><td>4830</td></tr><tr><td>8122</td><td>7544</td><td>8102</td><td>5830</td><td>672</td><td>8163</td><td>15</td><td>7853</td><td>3915</td><td>4945</td></tr><tr><td>9847</td><td>4244</td><td>2419</td><td>7964</td><td>6658</td><td>9869</td><td>3908</td><td>794</td><td>3749</td><td>8474</td></tr><tr><td>5580</td><td>5940</td><td>619</td><td>595</td><td>3299</td><td>9848</td><td>5299</td><td>4768</td><td>4433</td><td>5693</td></tr><tr><td>9598</td><td>2554</td><td>3237</td><td>7699</td><td>8384</td><td>3908</td><td>5862</td><td>8399</td><td>1760</td><td>9776</td></tr><tr><td>3343</td><td>1607</td><td>4019</td><td>5762</td><td>9571</td><td>677</td><td>5630</td><td>3478</td><td>1470</td><td>9378</td></tr><tr><td>1952</td><td>7050</td><td>5317</td><td>2570</td><td>7644</td><td>8616</td><td>2417</td><td>2943</td><td>3384</td><td>6850</td></tr><tr><td>8636</td><td>2981</td><td>9403</td><td>1872</td><td>680</td><td>7787</td><td>5780</td><td>6541</td><td>6185</td><td>7540</td></tr><tr><td>6317</td><td>9528</td><td>9146</td><td>336</td><td>5289</td><td>8716</td><td>1012</td><td>919</td><td>2194</td><td>2481</td></tr><tr><td>297</td><td>4145</td><td>9531</td><td>5614</td><td>6715</td><td>7175</td><td>4229</td><td>9131</td><td>117</td><td>7613</td></tr><tr><td>5980</td><td>8752</td><td>594</td><td>5383</td><td>623</td><td>1273</td><td>3169</td><td>6403</td><td>7814</td><td>9354</td></tr><tr><td>3942</td><td>4131</td><td>8881</td><td>3087</td><td>4466</td><td>4170</td><td>1803</td><td>5477</td><td>5088</td><td>3997</td></tr><tr><td>7958</td><td>5384</td><td>8141</td><td>7488</td><td>997</td><td>4856</td><td>4662</td><td>5226</td><td>3986</td><td>4779</td></tr><tr><td>2838</td><td>9966</td><td>3530</td><td>3431</td><td>5349</td><td>4153</td><td>4704</td><td>8518</td><td>555</td><td>2518</td></tr><tr><td>7871</td><td>4496</td><td>6648</td><td>6752</td><td>7583</td><td>1114</td><td>921</td><td>9386</td><td>6590</td><td>6008</td></tr><tr><td>3382</td><td>4547</td><td>1392</td><td>1523</td><td>2035</td><td>2389</td><td>6378</td><td>6697</td><td>7614</td><td>364</td></tr><tr><td>1476</td><td>452</td><td>330</td><td>5005</td><td>3883</td><td>5678</td><td>9158</td><td>8586</td><td>4195</td><td>9712</td></tr><tr><td>1104</td><td>2066</td><td>4208</td><td>7751</td><td>8817</td><td>1791</td><td>8864</td><td>9737</td><td>1176</td><td>5454</td></tr><tr><td>5745</td><td>4558</td><td>1</td><td>7137</td><td>6080</td><td>2036</td><td>9525</td><td>2458</td><td>8733</td><td>7139</td></tr><tr><td>2821</td><td>208</td><td>7590</td><td>3151</td><td>5213</td><td>1472</td><td>8828</td><td>4370</td><td>58</td><td>3023</td></tr><tr><td>4082</td><td>1161</td><td>5088</td><td>8290</td><td>8912</td><td>3904</td><td>80</td><td>7776</td><td>3641</td><td>1256</td></tr><tr><td>3229</td><td>9386</td><td>5813</td><td>3230</td><td>6522</td><td>1893</td><td>5265</td><td>6047</td><td>4351</td><td>3998</td></tr><tr><td>3185</td><td>7172</td><td>4205</td><td>774</td><td>322</td><td>9417</td><td>2246</td><td>9149</td><td>3787</td><td>2303</td></tr><tr><td>2171</td><td>7868</td><td>3463</td><td>7259</td><td>6157</td><td>2374</td><td>1162</td><td>6237</td><td>150</td><td>4803</td></tr><tr><td>7493</td><td>3379</td><td>4188</td><td>3306</td><td>6608</td><td>710</td><td>5199</td><td>1873</td><td>6756</td><td>9549</td></tr><tr><td>5870</td><td>9940</td><td>6720</td><td>74</td><td>714</td><td>7041</td><td>9491</td><td>2959</td><td>6190</td><td>3277</td></tr><tr><td>5261</td><td>8361</td><td>1145</td><td>8724</td><td>5619</td><td>7301</td><td>1098</td><td>6781</td><td>3538</td><td>1247</td></tr><tr><td>1583</td><td>1031</td><td>4625</td><td>5770</td><td>4336</td><td>1232</td><td>6480</td><td>9534</td><td>3104</td><td>3235</td></tr><tr><td>9082</td><td>8974</td><td>3175</td><td>5802</td><td>9047</td><td>3888</td><td>2843</td><td>8537</td><td>6847</td><td>9033</td></tr><tr><td>1814</td><td>2107</td><td>7393</td><td>2958</td><td>830</td><td>3011</td><td>259</td><td>1928</td><td>9791</td><td>3796</td></tr><tr><td>3174</td><td>1374</td><td>4826</td><td>7798</td><td>7143</td><td>9162</td><td>9030</td><td>3622</td><td>8695</td><td>2134</td></tr><tr><td>6857</td><td>7777</td><td>1107</td><td>31</td><td>3579</td><td>154</td><td>3919</td><td>6421</td><td>8690</td><td>765</td></tr><tr><td>5453</td><td>504</td><td>2872</td><td>2846</td><td>3461</td><td>3702</td><td>5857</td><td>3719</td><td>5629</td><td>5647</td></tr><tr><td>7515</td><td>8802</td><td>7021</td><td>2341</td><td>6600</td><td>4163</td><td>1502</td><td>5629</td><td>7785</td><td>197</td></tr><tr><td>7762</td><td>4642</td><td>7974</td><td>8868</td><td>4673</td><td>1553</td><td>9021</td><td>8591</td><td>7973</td><td>7711</td></tr><tr><td>9355</td><td>3426</td><td>8215</td><td>2226</td><td>6272</td><td>1675</td><td>5927</td><td>2128</td><td>5394</td><td>1556</td></tr><tr><td>7775</td><td>2909</td><td>357</td><td>4795</td><td>5249</td><td>6956</td><td>8958</td><td>6751</td><td>2585</td><td>6743</td></tr><tr><td>6948</td><td>346</td><td>1384</td><td>4922</td><td>9214</td><td>6056</td><td>6474</td><td>8235</td><td>4646</td><td>4447</td></tr><tr><td>5946</td><td>4001</td><td>7873</td><td>4160</td><td>6227</td><td>4144</td><td>5835</td><td>2154</td><td>6271</td><td>1229</td></tr><tr><td>3709</td><td>4045</td><td>4137</td><td>4066</td><td>8840</td><td>9386</td><td>1021</td><td>7797</td><td>6137</td><td>3605</td></tr><tr><td>4539</td><td>3085</td><td>3951</td><td>5922</td><td>8006</td><td>3165</td><td>1978</td><td>4479</td><td>1400</td><td>6624</td></tr><tr><td>8926</td><td>7345</td><td>624</td><td>6798</td><td>1505</td><td>6851</td><td>942</td><td>7340</td><td>9004</td><td>7212</td></tr><tr><td>8568</td><td>2712</td><td>1257</td><td>2704</td><td>6777</td><td>96</td><td>2090</td><td>7798</td><td>7892</td><td>8226</td></tr><tr><td>1403</td><td>2431</td><td>1310</td><td>5354</td><td>8353</td><td>9316</td><td>8518</td><td>330</td><td>3795</td><td>9917</td></tr><tr><td>6953</td><td>2720</td><td>7262</td><td>7577</td><td>9518</td><td>8767</td><td>4427</td><td>459</td><td>6106</td><td>3431</td></tr><tr><td>7671</td><td>4674</td><td>6142</td><td>8927</td><td>7378</td><td>2919</td><td>9023</td><td>9467</td><td>717</td><td>6915</td></tr><tr><td>7693</td><td>2119</td><td>9345</td><td>9003</td><td>7472</td><td>7697</td><td>8318</td><td>5990</td><td>8027</td><td>2113</td></tr><tr><td>5907</td><td>4980</td><td>4833</td><td>3169</td><td>2557</td><td>4350</td><td>1935</td><td>6984</td><td>4809</td><td>8041</td></tr><tr><td>414</td><td>2479</td><td>2715</td><td>6556</td><td>1406</td><td>93</td><td>9474</td><td>428</td><td>9559</td><td>191</td></tr><tr><td>7343</td><td>7252</td><td>2309</td><td>6688</td><td>6255</td><td>9781</td><td>4385</td><td>4573</td><td>5771</td><td>2411</td></tr><tr><td>6685</td><td>1677</td><td>7391</td><td>1517</td><td>4846</td><td>9947</td><td>5866</td><td>6781</td><td>6930</td><td>674</td></tr><tr><td>4822</td><td>7343</td><td>3153</td><td>7536</td><td>3899</td><td>4558</td><td>7628</td><td>3372</td><td>4986</td><td>7187</td></tr><tr><td>3563</td><td>2329</td><td>4439</td><td>5871</td><td>9016</td><td>693</td><td>5652</td><td>3400</td><td>5265</td><td>1423</td></tr><tr><td>5811</td><td>1949</td><td>3100</td><td>3201</td><td>3466</td><td>7945</td><td>3148</td><td>9331</td><td>4725</td><td>77</td></tr><tr><td>5</td><td>9547</td><td>7420</td><td>3158</td><td>7083</td><td>1318</td><td>7715</td><td>4710</td><td>4690</td><td>2701</td></tr><tr><td>1897</td><td>8252</td><td>5029</td><td>6335</td><td>4123</td><td>4044</td><td>7028</td><td>9775</td><td>7444</td><td>2293</td></tr><tr><td>1197</td><td>3254</td><td>4241</td><td>4296</td><td>6454</td><td>7706</td><td>2241</td><td>9601</td><td>7037</td><td>6966</td></tr><tr><td>9678</td><td>7042</td><td>6512</td><td>7098</td><td>200</td><td>3594</td><td>8416</td><td>7915</td><td>8304</td><td>3106</td></tr><tr><td>615</td><td>201</td><td>1358</td><td>5644</td><td>6536</td><td>5481</td><td>9687</td><td>3563</td><td>5255</td><td>7131</td></tr><tr><td>5855</td><td>6452</td><td>384</td><td>96</td><td>748</td><td>6838</td><td>7802</td><td>2989</td><td>6439</td><td>4839</td></tr><tr><td>9954</td><td>6116</td><td>1881</td><td>6465</td><td>3214</td><td>2080</td><td>59</td><td>1630</td><td>9994</td><td>8363</td></tr><tr><td>4735</td><td>609</td><td>8563</td><td>6093</td><td>6252</td><td>5098</td><td>1573</td><td>5939</td><td>8660</td><td>6828</td></tr><tr><td>3069</td><td>4515</td><td>3280</td><td>3452</td><td>4610</td><td>4027</td><td>289</td><td>2412</td><td>7015</td><td>6727</td></tr><tr><td>7250</td><td>6969</td><td>2843</td><td>9130</td><td>3434</td><td>6057</td><td>1210</td><td>3492</td><td>7686</td><td>1203</td></tr><tr><td>1855</td><td>2421</td><td>1811</td><td>417</td><td>8514</td><td>8062</td><td>5514</td><td>87</td><td>4001</td><td>4174</td></tr><tr><td>6914</td><td>7069</td><td>8688</td><td>193</td><td>521</td><td>3298</td><td>4220</td><td>809</td><td>5710</td><td>1235</td></tr><tr><td>7536</td><td>2959</td><td>8204</td><td>379</td><td>2089</td><td>1637</td><td>6435</td><td>3298</td><td>5129</td><td>4121</td></tr><tr><td>4501</td><td>6983</td><td>6542</td><td>6311</td><td>7399</td><td>5056</td><td>4373</td><td>2913</td><td>5142</td><td>8373</td></tr><tr><td>7086</td><td>2056</td><td>5442</td><td>5774</td><td>2248</td><td>5962</td><td>9072</td><td>6468</td><td>6771</td><td>4781</td></tr><tr><td>7703</td><td>4306</td><td>7740</td><td>5906</td><td>4685</td><td>9828</td><td>7542</td><td>1120</td><td>3126</td><td>2671</td></tr><tr><td>5240</td><td>7626</td><td>9653</td><td>1782</td><td>3936</td><td>7051</td><td>6838</td><td>8309</td><td>9964</td><td>1979</td></tr><tr><td>6682</td><td>7049</td><td>4034</td><td>2123</td><td>2823</td><td>6282</td><td>8084</td><td>1894</td><td>2750</td><td>4854</td></tr><tr><td>6674</td><td>452</td><td>9160</td><td>4413</td><td>6358</td><td>3844</td><td>4241</td><td>3900</td><td>4963</td><td>7366</td></tr><tr><td>6570</td><td>203</td><td>4991</td><td>6222</td><td>1985</td><td>8927</td><td>3273</td><td>8822</td><td>7236</td><td>3236</td></tr><tr><td>800</td><td>3917</td><td>285</td><td>4834</td><td>6040</td><td>3107</td><td>1115</td><td>4124</td><td>5000</td><td>3864</td></tr><tr><td>8977</td><td>1674</td><td>4316</td><td>8137</td><td>6087</td><td>673</td><td>1980</td><td>327</td><td>4572</td><td>6943</td></tr><tr><td>7693</td><td>1141</td><td>7146</td><td>2684</td><td>7363</td><td>9130</td><td>1611</td><td>636</td><td>7951</td><td>8846</td></tr><tr><td>3871</td><td>8751</td><td>2763</td><td>4155</td><td>3584</td><td>8802</td><td>7262</td><td>4699</td><td>2925</td><td>2261</td></tr><tr><td>8562</td><td>1902</td><td>3935</td><td>2878</td><td>38</td><td>21</td><td>3550</td><td>2018</td><td>348</td><td>8122</td></tr><tr><td>8961</td><td>8040</td><td>9263</td><td>6106</td><td>724</td><td>6626</td><td>5235</td><td>2334</td><td>7261</td><td>3186</td></tr><tr><td>1179</td><td>1131</td><td>1937</td><td>3942</td><td>5286</td><td>5521</td><td>2743</td><td>2547</td><td>219</td><td>5668</td></tr><tr><td>4808</td><td>8781</td><td>7569</td><td>8742</td><td>1658</td><td>7607</td><td>8763</td><td>5208</td><td>9625</td><td>9110</td></tr><tr><td>3330</td><td>8585</td><td>7150</td><td>2592</td><td>4691</td><td>7873</td><td>9217</td><td>9926</td><td>206</td><td>6478</td></tr><tr><td>3111</td><td>1385</td><td>7609</td><td>5048</td><td>5326</td><td>2894</td><td>568</td><td>8069</td><td>5441</td><td>786</td></tr><tr><td>3736</td><td>249</td><td>9567</td><td>1305</td><td>8991</td><td>1225</td><td>8911</td><td>7753</td><td>6433</td><td>8535</td></tr><tr><td>6863</td><td>9762</td><td>7120</td><td>4012</td><td>2354</td><td>1810</td><td>1885</td><td>1571</td><td>1735</td><td>2091</td></tr><tr><td>8048</td><td>4846</td><td>3476</td><td>5656</td><td>9894</td><td>8801</td><td>8550</td><td>461</td><td>6870</td><td>3990</td></tr><tr><td>1247</td><td>605</td><td>4239</td><td>813</td><td>1909</td><td>3229</td><td>2038</td><td>820</td><td>981</td><td>8470</td></tr><tr><td>9355</td><td>7843</td><td>8231</td><td>6475</td><td>1855</td><td>584</td><td>8285</td><td>3740</td><td>2155</td><td>20</td></tr><tr><td>5830</td><td>202</td><td>4865</td><td>9305</td><td>5858</td><td>4758</td><td>8106</td><td>4407</td><td>5219</td><td>4975</td></tr><tr><td>8397</td><td>6465</td><td>5580</td><td>2635</td><td>7278</td><td>7489</td><td>5863</td><td>9316</td><td>8308</td><td>6844</td></tr><tr><td>7785</td><td>7663</td><td>4687</td><td>6015</td><td>4137</td><td>6541</td><td>6599</td><td>2421</td><td>280</td><td>8753</td></tr><tr><td>2440</td><td>6110</td><td>8955</td><td>7305</td><td>5414</td><td>4812</td><td>2063</td><td>3520</td><td>9218</td><td>7281</td></tr><tr><td>8494</td><td>7614</td><td>3746</td><td>4074</td><td>249</td><td>1024</td><td>1562</td><td>6112</td><td>339</td><td>9869</td></tr><tr><td>2955</td><td>8123</td><td>7531</td><td>7642</td><td>4138</td><td>1667</td><td>4182</td><td>736</td><td>4088</td><td>4462</td></tr><tr><td>9489</td><td>6527</td><td>572</td><td>8443</td><td>3831</td><td>5986</td><td>3254</td><td>5893</td><td>9505</td><td>2472</td></tr><tr><td>3174</td><td>7999</td><td>85</td><td>6919</td><td>2072</td><td>334</td><td>7942</td><td>3633</td><td>6445</td><td>8281</td></tr><tr><td>3501</td><td>9400</td><td>6403</td><td>1032</td><td>7041</td><td>541</td><td>2699</td><td>1223</td><td>1276</td><td>6786</td></tr><tr><td>5685</td><td>765</td><td>3313</td><td>6256</td><td>9207</td><td>7144</td><td>2241</td><td>2461</td><td>3036</td><td>1746</td></tr><tr><td>4932</td><td>6210</td><td>9744</td><td>5017</td><td>3128</td><td>1815</td><td>5350</td><td>1070</td><td>5447</td><td>1795</td></tr><tr><td>9351</td><td>8948</td><td>1194</td><td>5753</td><td>9980</td><td>8235</td><td>6293</td><td>2679</td><td>9457</td><td>7569</td></tr><tr><td>9464</td><td>5141</td><td>8333</td><td>2777</td><td>1397</td><td>7540</td><td>9920</td><td>3637</td><td>10000</td><td>2956</td></tr><tr><td>5382</td><td>4932</td><td>9165</td><td>5126</td><td>9948</td><td>2293</td><td>6940</td><td>5298</td><td>3362</td><td>2387</td></tr><tr><td>7092</td><td>2712</td><td>1334</td><td>8286</td><td>8465</td><td>1314</td><td>6520</td><td>4758</td><td>3992</td><td>5976</td></tr><tr><td>2327</td><td>3456</td><td>1117</td><td>660</td><td>6232</td><td>2513</td><td>8199</td><td>6151</td><td>6150</td><td>8199</td></tr><tr><td>9107</td><td>1532</td><td>3131</td><td>8271</td><td>6657</td><td>3078</td><td>563</td><td>3597</td><td>8375</td><td>3925</td></tr><tr><td>5983</td><td>5467</td><td>6637</td><td>7317</td><td>3752</td><td>5101</td><td>8630</td><td>271</td><td>9859</td><td>2621</td></tr><tr><td>6247</td><td>2185</td><td>6076</td><td>7364</td><td>2844</td><td>2307</td><td>9877</td><td>1043</td><td>8458</td><td>6026</td></tr><tr><td>9242</td><td>7564</td><td>7558</td><td>2372</td><td>5835</td><td>4215</td><td>5450</td><td>6398</td><td>7811</td><td>3825</td></tr><tr><td>322</td><td>3793</td><td>9291</td><td>6958</td><td>1110</td><td>3043</td><td>2059</td><td>9739</td><td>3314</td><td>1917</td></tr><tr><td>2359</td><td>9560</td><td>4102</td><td>8434</td><td>6924</td><td>6945</td><td>741</td><td>6800</td><td>7988</td><td>9198</td></tr><tr><td>2826</td><td>7230</td><td>6762</td><td>384</td><td>9601</td><td>2597</td><td>4598</td><td>5051</td><td>8994</td><td>2409</td></tr><tr><td>8875</td><td>9315</td><td>6202</td><td>8166</td><td>6273</td><td>7311</td><td>1209</td><td>8332</td><td>7049</td><td>4522</td></tr><tr><td>248</td><td>9407</td><td>4082</td><td>4349</td><td>7841</td><td>1005</td><td>1294</td><td>8581</td><td>7805</td><td>9282</td></tr><tr><td>7779</td><td>630</td><td>6511</td><td>4541</td><td>1013</td><td>6112</td><td>7137</td><td>5611</td><td>1163</td><td>6130</td></tr><tr><td>8019</td><td>38</td><td>5445</td><td>4220</td><td>8203</td><td>1718</td><td>1530</td><td>9411</td><td>49</td><td>8578</td></tr><tr><td>3933</td><td>297</td><td>7985</td><td>8014</td><td>4645</td><td>5825</td><td>9019</td><td>5939</td><td>4405</td><td>6823</td></tr><tr><td>5221</td><td>2184</td><td>7452</td><td>1732</td><td>6724</td><td>8465</td><td>7844</td><td>3860</td><td>4075</td><td>9006</td></tr><tr><td>9990</td><td>2093</td><td>9043</td><td>5434</td><td>6312</td><td>7246</td><td>7152</td><td>7842</td><td>6657</td><td>7200</td></tr><tr><td>6419</td><td>589</td><td>7496</td><td>4404</td><td>8603</td><td>2141</td><td>228</td><td>7621</td><td>8080</td><td>4633</td></tr><tr><td>4443</td><td>3301</td><td>6816</td><td>1895</td><td>5032</td><td>3539</td><td>359</td><td>2875</td><td>7399</td><td>4434</td></tr><tr><td>1881</td><td>7388</td><td>6526</td><td>924</td><td>2822</td><td>2838</td><td>8169</td><td>9974</td><td>679</td><td>4826</td></tr><tr><td>7173</td><td>7098</td><td>5414</td><td>4669</td><td>1501</td><td>4016</td><td>6809</td><td>1729</td><td>1637</td><td>4889</td></tr><tr><td>6362</td><td>6080</td><td>8189</td><td>3178</td><td>7974</td><td>3220</td><td>6716</td><td>8333</td><td>6095</td><td>4115</td></tr><tr><td>2766</td><td>7975</td><td>1503</td><td>9291</td><td>8899</td><td>4325</td><td>2129</td><td>7067</td><td>4298</td><td>2807</td></tr><tr><td>1892</td><td>1470</td><td>9905</td><td>7306</td><td>6138</td><td>1406</td><td>1322</td><td>2947</td><td>3134</td><td>2958</td></tr><tr><td>7835</td><td>9495</td><td>9037</td><td>6023</td><td>2672</td><td>7011</td><td>9243</td><td>9388</td><td>5343</td><td>5338</td></tr><tr><td>3503</td><td>8108</td><td>3313</td><td>5005</td><td>7398</td><td>2211</td><td>9330</td><td>9526</td><td>9277</td><td>3627</td></tr><tr><td>2333</td><td>1169</td><td>5097</td><td>2237</td><td>8474</td><td>1235</td><td>3642</td><td>9796</td><td>4181</td><td>6776</td></tr><tr><td>2753</td><td>2016</td><td>6271</td><td>1790</td><td>8038</td><td>8943</td><td>8800</td><td>7281</td><td>8331</td><td>4142</td></tr><tr><td>2618</td><td>1833</td><td>2250</td><td>5930</td><td>6838</td><td>9648</td><td>8140</td><td>6167</td><td>9173</td><td>7417</td></tr><tr><td>9794</td><td>1506</td><td>8585</td><td>4890</td><td>3743</td><td>7059</td><td>6124</td><td>7384</td><td>6854</td><td>304</td></tr><tr><td>4160</td><td>9607</td><td>2320</td><td>430</td><td>1397</td><td>357</td><td>9373</td><td>197</td><td>7638</td><td>7703</td></tr><tr><td>4338</td><td>255</td><td>9536</td><td>6587</td><td>6184</td><td>6373</td><td>6234</td><td>4324</td><td>2540</td><td>5407</td></tr><tr><td>1740</td><td>2333</td><td>6913</td><td>325</td><td>7222</td><td>655</td><td>7384</td><td>3345</td><td>8039</td><td>4238</td></tr><tr><td>3649</td><td>2199</td><td>3844</td><td>5968</td><td>2628</td><td>5241</td><td>6325</td><td>2001</td><td>5437</td><td>3962</td></tr><tr><td>9703</td><td>9775</td><td>4217</td><td>9238</td><td>6362</td><td>401</td><td>5611</td><td>2596</td><td>4724</td><td>8150</td></tr><tr><td>8003</td><td>6464</td><td>482</td><td>4915</td><td>6788</td><td>7704</td><td>5570</td><td>4171</td><td>1049</td><td>3608</td></tr><tr><td>8408</td><td>4698</td><td>5806</td><td>2252</td><td>666</td><td>8434</td><td>7493</td><td>6991</td><td>434</td><td>2929</td></tr><tr><td>952</td><td>137</td><td>2703</td><td>5169</td><td>9375</td><td>9065</td><td>5569</td><td>4985</td><td>1660</td><td>293</td></tr><tr><td>3134</td><td>9662</td><td>6756</td><td>3616</td><td>4577</td><td>3544</td><td>1320</td><td>146</td><td>7715</td><td>2368</td></tr><tr><td>3754</td><td>6123</td><td>7066</td><td>9560</td><td>8375</td><td>7731</td><td>7993</td><td>5867</td><td>4721</td><td>8427</td></tr><tr><td>8796</td><td>5673</td><td>8564</td><td>1499</td><td>841</td><td>7938</td><td>563</td><td>6410</td><td>2922</td><td>2222</td></tr><tr><td>6703</td><td>6056</td><td>1884</td><td>3459</td><td>9672</td><td>6460</td><td>7003</td><td>991</td><td>6605</td><td>4717</td></tr><tr><td>3359</td><td>358</td><td>840</td><td>424</td><td>9917</td><td>9214</td><td>8155</td><td>7910</td><td>5081</td><td>2875</td></tr><tr><td>6337</td><td>3876</td><td>8548</td><td>4901</td><td>5375</td><td>9389</td><td>2838</td><td>5937</td><td>5799</td><td>5759</td></tr><tr><td>8158</td><td>2501</td><td>1815</td><td>42</td><td>5960</td><td>1486</td><td>6501</td><td>2962</td><td>2477</td><td>3106</td></tr><tr><td>7679</td><td>5836</td><td>3464</td><td>8519</td><td>6259</td><td>3381</td><td>7733</td><td>4414</td><td>1290</td><td>2813</td></tr><tr><td>7289</td><td>7627</td><td>6689</td><td>5836</td><td>2527</td><td>2063</td><td>5224</td><td>5364</td><td>7999</td><td>1022</td></tr><tr><td>1123</td><td>6157</td><td>3523</td><td>2938</td><td>6198</td><td>9482</td><td>4424</td><td>2699</td><td>2444</td><td>6900</td></tr><tr><td>5804</td><td>122</td><td>2735</td><td>9267</td><td>8640</td><td>8994</td><td>2647</td><td>6372</td><td>3407</td><td>3937</td></tr><tr><td>9185</td><td>695</td><td>1564</td><td>5874</td><td>6530</td><td>4090</td><td>7936</td><td>1754</td><td>9454</td><td>5935</td></tr><tr><td>2776</td><td>577</td><td>2092</td><td>6299</td><td>3515</td><td>8290</td><td>5780</td><td>7938</td><td>988</td><td>8224</td></tr><tr><td>4837</td><td>6792</td><td>8346</td><td>7572</td><td>6059</td><td>6986</td><td>6565</td><td>8705</td><td>3357</td><td>9972</td></tr><tr><td>2642</td><td>2542</td><td>666</td><td>4205</td><td>8415</td><td>7196</td><td>8295</td><td>6351</td><td>8950</td><td>7749</td></tr><tr><td>2286</td><td>1725</td><td>8326</td><td>4377</td><td>8023</td><td>1841</td><td>2667</td><td>3803</td><td>9778</td><td>3655</td></tr><tr><td>2026</td><td>4615</td><td>446</td><td>372</td><td>2186</td><td>6504</td><td>7357</td><td>8750</td><td>5209</td><td>714</td></tr><tr><td>8721</td><td>7851</td><td>3255</td><td>9387</td><td>2056</td><td>1670</td><td>6583</td><td>351</td><td>8020</td><td>5532</td></tr><tr><td>8100</td><td>306</td><td>7257</td><td>6425</td><td>4682</td><td>5279</td><td>8266</td><td>7348</td><td>9082</td><td>8043</td></tr><tr><td>1002</td><td>1108</td><td>2657</td><td>1448</td><td>1479</td><td>4842</td><td>7952</td><td>8835</td><td>3592</td><td>3160</td></tr><tr><td>9548</td><td>2313</td><td>1011</td><td>2803</td><td>1699</td><td>3066</td><td>4472</td><td>8282</td><td>3416</td><td>2492</td></tr><tr><td>3813</td><td>1515</td><td>2797</td><td>1069</td><td>7940</td><td>7479</td><td>6348</td><td>6205</td><td>4826</td><td>5430</td></tr><tr><td>4248</td><td>5828</td><td>6538</td><td>6904</td><td>7276</td><td>8016</td><td>1746</td><td>5227</td><td>6851</td><td>5337</td></tr><tr><td>8387</td><td>6398</td><td>7650</td><td>9397</td><td>9200</td><td>9348</td><td>2462</td><td>3672</td><td>7630</td><td>5877</td></tr><tr><td>6163</td><td>1442</td><td>7392</td><td>8959</td><td>2511</td><td>5332</td><td>6438</td><td>8859</td><td>1536</td><td>1263</td></tr><tr><td>4289</td><td>5783</td><td>7091</td><td>826</td><td>2687</td><td>4366</td><td>8842</td><td>4432</td><td>9593</td><td>5692</td></tr><tr><td>9769</td><td>7979</td><td>2089</td><td>7418</td><td>7375</td><td>1289</td><td>6766</td><td>9836</td><td>4960</td><td>4395</td></tr><tr><td>5713</td><td>1123</td><td>5837</td><td>3105</td><td>81</td><td>8348</td><td>8436</td><td>6518</td><td>7207</td><td>9972</td></tr><tr><td>7781</td><td>1495</td><td>5755</td><td>4872</td><td>2321</td><td>8441</td><td>9238</td><td>1162</td><td>2873</td><td>8830</td></tr><tr><td>6853</td><td>2641</td><td>6809</td><td>8941</td><td>58</td><td>4183</td><td>229</td><td>6823</td><td>4019</td><td>5189</td></tr><tr><td>1217</td><td>9731</td><td>6311</td><td>7054</td><td>2835</td><td>6392</td><td>5401</td><td>1271</td><td>2910</td><td>2607</td></tr><tr><td>1242</td><td>691</td><td>4101</td><td>6996</td><td>5563</td><td>6422</td><td>5436</td><td>4800</td><td>7583</td><td>8308</td></tr><tr><td>3630</td><td>4435</td><td>948</td><td>438</td><td>3375</td><td>1006</td><td>4620</td><td>3604</td><td>7828</td><td>8639</td></tr><tr><td>8793</td><td>9045</td><td>8369</td><td>5103</td><td>6099</td><td>1204</td><td>1495</td><td>1499</td><td>2474</td><td>4404</td></tr><tr><td>4105</td><td>3715</td><td>5095</td><td>8206</td><td>710</td><td>657</td><td>4627</td><td>6146</td><td>5456</td><td>2210</td></tr><tr><td>4454</td><td>9086</td><td>6644</td><td>5402</td><td>9523</td><td>19</td><td>6407</td><td>4143</td><td>3623</td><td>4235</td></tr><tr><td>2781</td><td>2415</td><td>3280</td><td>1150</td><td>7518</td><td>9378</td><td>2353</td><td>9012</td><td>877</td><td>4827</td></tr><tr><td>3416</td><td>4982</td><td>8542</td><td>8510</td><td>3188</td><td>9251</td><td>9166</td><td>7815</td><td>5397</td><td>4622</td></tr><tr><td>24</td><td>9850</td><td>3707</td><td>6667</td><td>5252</td><td>3230</td><td>6685</td><td>1658</td><td>7373</td><td>307</td></tr><tr><td>5893</td><td>154</td><td>2722</td><td>9172</td><td>1303</td><td>239</td><td>8550</td><td>3656</td><td>9250</td><td>9426</td></tr><tr><td>8482</td><td>2665</td><td>4408</td><td>7023</td><td>1175</td><td>7595</td><td>6274</td><td>340</td><td>5409</td><td>1671</td></tr><tr><td>4961</td><td>5432</td><td>1521</td><td>8668</td><td>2099</td><td>6772</td><td>1897</td><td>8784</td><td>8429</td><td>9269</td></tr><tr><td>9090</td><td>4322</td><td>9423</td><td>1812</td><td>3494</td><td>725</td><td>2050</td><td>2043</td><td>4381</td><td>1300</td></tr><tr><td>1469</td><td>2862</td><td>3965</td><td>5876</td><td>9885</td><td>5139</td><td>3470</td><td>6159</td><td>5478</td><td>8879</td></tr><tr><td>7830</td><td>439</td><td>4311</td><td>9350</td><td>9106</td><td>6409</td><td>6121</td><td>1003</td><td>5192</td><td>4550</td></tr><tr><td>272</td><td>4282</td><td>8872</td><td>9694</td><td>6093</td><td>2365</td><td>419</td><td>8142</td><td>4407</td><td>4799</td></tr><tr><td>9441</td><td>5876</td><td>7661</td><td>3405</td><td>1751</td><td>7546</td><td>8544</td><td>5221</td><td>3704</td><td>4021</td></tr><tr><td>4099</td><td>1534</td><td>4460</td><td>8409</td><td>883</td><td>3566</td><td>4818</td><td>7004</td><td>4569</td><td>9</td></tr><tr><td>1553</td><td>4840</td><td>4290</td><td>424</td><td>4534</td><td>383</td><td>2789</td><td>4952</td><td>8524</td><td>7195</td></tr><tr><td>9751</td><td>7965</td><td>3070</td><td>7411</td><td>1370</td><td>4821</td><td>4956</td><td>9913</td><td>41</td><td>8660</td></tr><tr><td>3934</td><td>4140</td><td>193</td><td>8393</td><td>2548</td><td>1075</td><td>1959</td><td>7365</td><td>8078</td><td>6527</td></tr><tr><td>7374</td><td>9631</td><td>1367</td><td>1663</td><td>55</td><td>5901</td><td>2046</td><td>2843</td><td>852</td><td>569</td></tr><tr><td>38</td><td>602</td><td>8534</td><td>3108</td><td>8013</td><td>9903</td><td>7928</td><td>2968</td><td>9816</td><td>7968</td></tr><tr><td>1627</td><td>3749</td><td>2108</td><td>1820</td><td>2142</td><td>4655</td><td>2894</td><td>4100</td><td>2020</td><td>972</td></tr><tr><td>627</td><td>9393</td><td>603</td><td>1994</td><td>1056</td><td>658</td><td>7894</td><td>3101</td><td>3501</td><td>8746</td></tr><tr><td>3670</td><td>3539</td><td>9348</td><td>2203</td><td>6646</td><td>7360</td><td>2106</td><td>4574</td><td>328</td><td>1921</td></tr><tr><td>2542</td><td>1955</td><td>5669</td><td>4649</td><td>3774</td><td>7811</td><td>9303</td><td>6668</td><td>1910</td><td>1323</td></tr><tr><td>7640</td><td>2537</td><td>715</td><td>8243</td><td>4531</td><td>1771</td><td>8901</td><td>2424</td><td>4871</td><td>2401</td></tr><tr><td>1170</td><td>8540</td><td>5940</td><td>517</td><td>743</td><td>2585</td><td>7877</td><td>2848</td><td>7158</td><td>8204</td></tr><tr><td>4768</td><td>9699</td><td>159</td><td>437</td><td>4347</td><td>3932</td><td>8247</td><td>3650</td><td>600</td><td>157</td></tr><tr><td>4972</td><td>8239</td><td>2694</td><td>5687</td><td>6482</td><td>7224</td><td>7457</td><td>5382</td><td>9647</td><td>2328</td></tr><tr><td>7782</td><td>816</td><td>868</td><td>3721</td><td>1333</td><td>1610</td><td>6306</td><td>9209</td><td>4458</td><td>3464</td></tr><tr><td>7413</td><td>9226</td><td>3163</td><td>7571</td><td>9663</td><td>7509</td><td>1503</td><td>7909</td><td>1159</td><td>2102</td></tr><tr><td>8066</td><td>6131</td><td>340</td><td>759</td><td>1818</td><td>6821</td><td>7982</td><td>9275</td><td>2203</td><td>7629</td></tr><tr><td>1602</td><td>9984</td><td>8445</td><td>2470</td><td>3705</td><td>9777</td><td>4080</td><td>11</td><td>8986</td><td>8537</td></tr><tr><td>3474</td><td>6398</td><td>7763</td><td>6636</td><td>3968</td><td>7425</td><td>4145</td><td>5470</td><td>5334</td><td>5304</td></tr><tr><td>7572</td><td>3399</td><td>1434</td><td>7912</td><td>4157</td><td>3252</td><td>4733</td><td>2139</td><td>2526</td><td>6935</td></tr><tr><td>9767</td><td>4128</td><td>6918</td><td>8211</td><td>6597</td><td>623</td><td>7988</td><td>676</td><td>633</td><td>6973</td></tr><tr><td>9213</td><td>4107</td><td>3370</td><td>6975</td><td>742</td><td>7338</td><td>4400</td><td>4887</td><td>2808</td><td>9733</td></tr><tr><td>190</td><td>379</td><td>3132</td><td>1623</td><td>8290</td><td>7289</td><td>4875</td><td>3023</td><td>9427</td><td>7400</td></tr><tr><td>9957</td><td>9194</td><td>1527</td><td>6875</td><td>7404</td><td>8123</td><td>7497</td><td>5391</td><td>8799</td><td>8130</td></tr><tr><td>2364</td><td>8011</td><td>2236</td><td>5733</td><td>4986</td><td>2978</td><td>3071</td><td>9385</td><td>7864</td><td>5879</td></tr><tr><td>9118</td><td>8053</td><td>6258</td><td>2249</td><td>9676</td><td>4548</td><td>9537</td><td>4550</td><td>7570</td><td>8964</td></tr><tr><td>1949</td><td>7526</td><td>8157</td><td>3476</td><td>4400</td><td>5560</td><td>1598</td><td>1897</td><td>951</td><td>396</td></tr><tr><td>26</td><td>3314</td><td>8407</td><td>2262</td><td>9047</td><td>3392</td><td>5239</td><td>2118</td><td>2776</td><td>3103</td></tr><tr><td>7996</td><td>1893</td><td>1155</td><td>4253</td><td>4142</td><td>831</td><td>8801</td><td>3678</td><td>5380</td><td>6370</td></tr><tr><td>2642</td><td>7329</td><td>3895</td><td>798</td><td>804</td><td>8295</td><td>6358</td><td>2402</td><td>191</td><td>7308</td></tr><tr><td>2798</td><td>217</td><td>622</td><td>1204</td><td>2478</td><td>9669</td><td>4596</td><td>7717</td><td>1786</td><td>7371</td></tr><tr><td>819</td><td>9782</td><td>9264</td><td>1973</td><td>4035</td><td>3406</td><td>2804</td><td>2835</td><td>7084</td><td>8183</td></tr><tr><td>9204</td><td>9725</td><td>5512</td><td>3099</td><td>522</td><td>6316</td><td>1393</td><td>6879</td><td>8718</td><td>1584</td></tr><tr><td>4186</td><td>1516</td><td>1800</td><td>4808</td><td>2720</td><td>4277</td><td>4476</td><td>7315</td><td>1994</td><td>6262</td></tr><tr><td>4686</td><td>2812</td><td>6043</td><td>3950</td><td>4785</td><td>77</td><td>7355</td><td>7588</td><td>2912</td><td>4438</td></tr><tr><td>5771</td><td>2115</td><td>4162</td><td>1282</td><td>5214</td><td>4683</td><td>7598</td><td>6607</td><td>1562</td><td>6316</td></tr><tr><td>8190</td><td>5748</td><td>7831</td><td>9989</td><td>555</td><td>550</td><td>4266</td><td>5031</td><td>7864</td><td>6259</td></tr><tr><td>1292</td><td>2550</td><td>9070</td><td>7335</td><td>6499</td><td>3854</td><td>7411</td><td>3853</td><td>1442</td><td>323</td></tr><tr><td>8290</td><td>7212</td><td>2438</td><td>2452</td><td>8494</td><td>7651</td><td>7135</td><td>6092</td><td>4257</td><td>8696</td></tr><tr><td>2407</td><td>2446</td><td>4443</td><td>237</td><td>2434</td><td>4997</td><td>787</td><td>6700</td><td>28</td><td>8650</td></tr><tr><td>2958</td><td>1319</td><td>1199</td><td>2028</td><td>8653</td><td>7697</td><td>5882</td><td>6064</td><td>1550</td><td>7323</td></tr><tr><td>6386</td><td>9840</td><td>4535</td><td>8823</td><td>2291</td><td>3029</td><td>6473</td><td>9425</td><td>9120</td><td>730</td></tr><tr><td>8120</td><td>1527</td><td>3175</td><td>2562</td><td>1763</td><td>5609</td><td>7559</td><td>2549</td><td>2308</td><td>7586</td></tr><tr><td>1199</td><td>5266</td><td>8905</td><td>2398</td><td>7293</td><td>7557</td><td>95</td><td>3174</td><td>3621</td><td>1644</td></tr><tr><td>497</td><td>6</td><td>1483</td><td>5031</td><td>8829</td><td>3774</td><td>8059</td><td>5301</td><td>3198</td><td>7179</td></tr><tr><td>6031</td><td>1317</td><td>8705</td><td>9205</td><td>3879</td><td>468</td><td>4814</td><td>1438</td><td>3017</td><td>7122</td></tr><tr><td>9023</td><td>4216</td><td>2388</td><td>7928</td><td>6613</td><td>9680</td><td>5484</td><td>6708</td><td>2854</td><td>9105</td></tr>							</tbody></table>
					
						</div>
EOT;

        $csv = <<<EOT
Column 1,Column 2,Column 3,Column 4,Column 5,Column 6,Column 7,Column 8,Column 9,Column 10
1279,365,7599,9716,3416,9512,2691,5991,2502,5165
2050,1162,1024,4386,7500,4742,9196,8895,2616,5158
1311,2141,3143,929,7847,6935,8026,5236,2785,688
1003,4063,1052,8601,3778,4467,8113,6469,458,614
1633,2507,1775,2657,6893,9275,7398,6088,8169,14
1246,9479,2155,4388,407,2,1323,8433,5237,4107
9120,6239,8169,171,4840,1947,4638,2953,8415,5095
3566,48,7601,5341,2704,4494,4615,102,582,2783
115,1827,2261,2270,6215,2668,2271,7537,1100,7508
1643,219,3747,9812,390,8587,1758,5027,1539,172
121,5104,220,7722,445,2923,2215,5059,3024,2796
7842,3139,4623,103,5408,837,2770,7679,8374,3870
5186,16,4088,8932,9828,4478,7518,1585,9504,9057
1757,9624,4160,1976,7346,4604,4898,9560,9663,7922
2356,7505,1060,6978,7607,6468,7815,376,4147,6188
4245,9332,6204,8333,8264,6031,2810,5782,7615,2314
4838,9371,1937,8998,1347,9282,3602,6244,8842,3265
4166,1197,769,5226,8175,8375,1693,5989,8751,5839
2176,2996,5171,8379,1329,3434,4409,4138,9216,2024
6451,4054,1395,8388,3051,2741,7670,6652,8984,6512
9916,3150,7708,685,8375,5883,9059,67,1871,7809
5906,4047,805,1077,2426,2133,4510,6835,6271,3726
8858,2722,7779,252,1109,830,2992,8779,7481,1976
5290,7397,5125,2998,8081,3499,8881,7140,3566,751
4949,9471,4798,5753,547,7223,7885,5057,4057,4155
8783,2914,6876,6561,3166,7985,7390,6157,6763,4871
8133,2053,2268,3257,5051,349,6756,3931,7488,321
4682,2436,9792,9479,8189,339,6702,6073,5396,758
227,4178,3672,7103,739,6838,5087,8129,2995,1850
3000,1127,3903,5267,4384,8953,5615,1139,2884,3103
1460,7565,5539,1252,7044,3727,1590,3745,9800,6985
4503,26,1163,8175,7129,1901,5012,2215,30,8007
4065,3029,9133,7967,8295,3517,6920,3910,4656,9803
7013,6115,7367,2551,7366,4410,6278,8956,8155,6077
5941,2657,6103,7103,832,3232,9004,5843,5446,9033
3849,9511,2062,2982,7478,356,6498,4397,4266,1154
4199,1279,7268,1566,3830,4634,5975,107,3589,4130
6184,9529,6786,2287,6632,7617,5518,5636,3460,964
4668,7309,474,6730,290,7951,7085,6788,2347,1351
7941,6546,2629,5209,8111,6458,9843,4086,6565,3431
8215,2748,2960,5000,5034,9592,2617,551,5227,6077
1514,9895,3385,1988,6624,3675,9938,3709,463,2285
5060,8404,8830,7688,3612,6940,4146,3454,1025,710
6885,9240,3458,9845,4239,8491,9436,6856,9042,4663
2932,556,4557,6317,2543,1181,9992,2481,4889,454
4766,9949,8857,3596,7636,2469,536,1781,5923,1561
2491,2808,800,5948,2652,5038,4439,2088,1894,3481
6751,4826,4036,1308,1142,6579,2488,1133,9060,7377
1587,3825,7325,444,7420,4961,2913,7956,6741,8835
9516,9232,1643,315,5179,4295,5353,9618,6382,7246
3098,3133,2071,7133,4440,3213,3712,6927,4346,2771
4303,5932,6596,1628,6375,4016,6588,9287,1971,3329
8122,1486,2560,9764,1800,7739,4058,7153,7356,440
4398,453,3572,6469,7586,8011,9681,1297,4938,4026
4068,9241,9958,664,868,6332,4680,7456,5619,6650
784,3740,8136,3344,3504,9936,1082,7562,7088,8438
8001,1486,8890,1573,7954,6476,9584,7635,7772,4521
1661,1840,3761,1618,2504,4629,7950,7183,2084,3568
3833,2868,7308,1968,6211,811,1904,7293,8372,8991
5730,6373,477,4620,7945,8430,1095,7528,6065,8867
2049,7725,706,5810,9342,3209,439,7291,392,2522
859,4224,5390,8166,6191,1601,8976,8095,8894,7348
7085,4623,3720,7562,9242,1664,5991,337,9192,2056
9203,1241,9780,9908,7050,9122,3117,7488,6412,3508
10,7271,7732,5400,5436,3923,7000,4411,2017,5893
1759,9102,516,5478,6663,9758,7142,2654,94,6334
4709,9296,7574,4488,9204,4623,3609,2320,2111,21
5828,2120,7291,3560,7519,2727,7482,4519,7138,9498
411,8896,8599,927,4373,5261,684,1515,7914,777
7848,2623,72,5421,7110,9275,44,719,1595,2154
739,7423,4273,8030,982,1792,756,8464,6310,7893
7961,6721,6789,6560,7647,1161,1821,8330,2675,9735
9107,522,2357,9178,5943,9466,8453,5986,185,48
8139,923,7470,2412,8953,8452,4203,9709,6915,513
7602,4876,7233,4390,1435,4879,5550,3255,3209,8225
2990,2315,8747,5346,1493,4689,4812,9946,674,4996
9993,8813,5919,7463,1224,4871,5915,5427,4580,2829
5939,2181,7705,3171,6570,9139,8050,2120,2394,1259
345,5384,3573,9091,729,5066,3779,5540,5011,4453
536,5004,3266,6454,2466,4489,1325,8381,9915,5904
1210,5853,8085,8914,9024,4654,8053,7073,6774,447
8331,7118,5830,1904,6208,6558,6970,9987,2098,1981
4440,2634,6984,7705,9087,9450,2194,412,7830,2109
6316,9039,7961,4400,7953,6985,9054,6005,4058,5827
6451,2389,2945,2280,4292,9153,8838,1262,9140,936
3242,3580,3569,225,1285,2655,9674,3478,3066,7504
5586,9382,6542,3547,3781,4494,531,2835,499,4588
8662,6949,6976,1606,9229,1268,759,8066,2529,9898
9001,5770,3477,2569,5995,4761,5224,5668,8239,8290
3172,3824,7671,9714,7370,1452,4208,7901,4286,4706
2488,2947,1655,9463,4552,883,731,5310,8948,3259
5208,7949,9029,8685,518,5023,3445,5741,691,1683
4031,3862,5507,1701,3575,2877,3152,7783,777,7437
2488,3264,384,4142,2727,4935,5024,3457,245,3972
6716,5452,1921,5744,4137,2438,767,7581,8179,1457
9264,2209,5319,4771,3909,8894,7647,7061,6676,8423
4498,9163,1687,4881,3305,4413,9816,8329,7870,60
2300,4586,5512,4221,330,9648,6658,1096,7229,4836
2553,6493,7044,7872,1263,953,6765,8909,8013,3441
7332,2511,2604,9018,7391,5908,3431,7206,4236,1301
7266,6536,5886,2778,756,6215,2426,7414,7311,9655
2249,9863,6147,9293,7734,7410,245,4499,6318,8258
7939,3650,768,542,2667,8159,6450,6098,5365,685
7398,2631,7221,3283,5408,7976,9498,7834,5389,6809
7488,7638,6671,3634,6930,4405,1044,7175,8904,7362
5433,6842,1011,6201,7384,3678,4359,3833,9775,9723
4518,7172,2353,1738,455,7761,9713,9953,5594,5102
6761,3082,2739,3432,6716,9669,7836,7759,6843,6740
5120,2275,3581,6130,8476,965,9807,2834,4797,9581
2557,9314,6753,4910,1052,7208,2671,764,7160,8265
5865,3920,1346,8604,7351,8061,8272,5187,5820,5115
1926,939,7390,5507,7069,5865,6472,6875,8698,1268
6456,1255,582,3208,6165,1634,416,8835,2397,7575
7099,8262,1494,8444,6866,8845,6505,5137,4031,2324
252,5957,3263,7641,1464,331,3505,7935,7205,2203
9203,3661,3458,9785,6869,9622,1418,7284,8456,3815
4858,5555,2076,6352,3999,8942,5196,503,4078,9227
2827,4330,5183,6089,1970,6647,6419,5475,4581,3624
7677,3783,7284,1134,3568,4153,756,4985,1436,9211
8799,6293,4765,875,2645,8764,9816,7840,9266,3894
7067,2093,8223,2250,8182,192,8896,4600,5666,3476
8224,3343,7259,5508,4477,826,9660,5232,5811,1095
4443,4609,7388,9208,5483,32,7971,5298,7872,7237
9192,4938,9329,7414,7187,7510,7606,6082,2110,3272
9558,334,6614,6817,5841,1091,7643,5500,6322,3453
6595,764,8061,3983,9972,3544,4014,7942,8842,1886
5178,8033,6823,4506,5446,4009,2016,3052,91,4126
6323,9649,4459,2937,6465,299,4027,4107,5799,349
7559,2394,1113,5620,6376,1084,9163,390,9025,8004
2275,4202,6036,9097,8708,1482,3106,724,4533,3197
4850,855,2845,9308,3792,9309,9607,7818,3416,5406
8166,974,7799,9278,6593,4174,361,5755,4564,9386
3759,6838,3588,9794,5935,2296,1276,9040,3019,5808
2236,7868,6663,5080,7176,454,4389,6782,8272,7804
2188,6437,8778,9986,5715,5371,4160,6076,1126,8723
5462,4884,5561,9049,4678,1495,1344,5953,534,4363
1761,2770,2231,8424,7849,9407,8878,2238,6188,7149
41,8376,3586,8819,8361,9300,4189,2521,5376,5314
1244,837,197,6804,9885,4875,8298,1229,828,8832
5592,2588,1601,7822,1012,9450,7228,9889,1687,3416
7037,1728,1791,623,547,152,9922,4735,2672,5298
48,3915,6134,245,719,6019,5120,9017,7248,5947
7848,2839,8534,9449,661,9545,8898,7888,9434,585
1304,6471,2313,3095,7093,2859,3246,7014,7594,5918
2312,7642,9833,8445,7887,551,4464,3006,9567,1711
8952,7415,4549,7486,6863,5209,7031,5761,3097,6464
6345,4400,2934,8658,7494,26,1517,740,7040,9110
6657,9351,6751,6489,7796,4637,7040,2259,7642,6607
3969,6594,4021,8518,4079,883,3727,1109,6644,6823
7572,2989,1223,505,1646,8717,531,3162,9456,7570
2271,6113,6921,9022,2602,4716,3659,9641,6975,1300
6247,944,7893,268,9461,1972,1151,3187,3080,7794
10,651,782,1232,1156,2427,9948,1687,5589,9404
9256,7860,5516,6177,6881,8117,892,539,7758,7866
1839,4005,8809,9732,4272,8270,1703,5422,1457,4782
3215,1466,5433,3997,2697,6589,6423,2645,8275,2012
2048,7531,9871,7564,3707,6751,5681,4598,7290,3438
2464,9128,7443,1273,8859,1714,9542,561,7136,999
5343,351,2464,775,4347,5161,7364,770,7806,5638
2781,9854,3168,2651,7417,6874,9402,3098,1472,6691
6535,3935,5818,3978,5208,4677,5691,4750,5238,2827
5748,581,3177,8211,1355,7524,3372,8718,8293,1177
4356,1073,1030,7523,3724,8446,4397,3125,1543,5868
9815,8078,9803,5633,2056,5010,310,7747,9759,5548
573,5506,6128,3749,3717,7483,1273,7088,6201,9565
8265,556,637,9294,8079,4361,7740,2475,7485,9283
8342,7300,7361,8145,2933,9416,3154,3243,7162,2912
8790,7734,8418,4917,1483,2134,2399,2755,9222,8600
2320,7486,9155,2957,6780,7233,7317,4519,9708,4802
3801,8050,2101,1162,6194,5034,577,9347,8276,7739
2259,7066,5473,677,1982,6956,2810,4381,9710,2032
2980,2030,9518,2135,4986,6297,9368,2302,815,9075
7104,4616,7124,9204,5777,3317,4238,6354,2664,2514
4092,4922,9579,9564,5598,1560,6519,8408,5941,6229
440,8921,8258,9957,1056,3243,6254,423,5545,7068
9498,2648,1684,6621,1852,7460,9938,6090,3813,2601
8603,7904,7523,8181,7467,3121,9741,3986,1529,5681
214,1969,4602,8471,1925,5657,1714,8179,6080,7259
5246,5577,9907,6929,2198,1758,4389,2135,7848,8202
4736,6450,6105,2259,4630,3572,5380,4370,7558,6908
51,7771,8877,4652,6242,802,309,7955,8980,6388
5214,4225,1965,5120,1154,4162,6878,5543,6297,4725
3744,1033,1174,9849,3291,5804,3421,8670,173,978
5578,224,8748,4454,4876,4990,5256,5185,2945,4235
1573,8158,8460,3537,3278,9613,7699,155,5156,3995
4880,8899,5027,6054,8747,8318,1857,2168,6988,2030
3145,2566,2253,1893,7020,7129,6882,2275,2313,9826
6509,3885,7983,4968,7421,1260,4581,5120,1415,9736
9114,6294,8635,4141,2348,7382,2459,4204,9549,9446
6234,2693,2012,8487,4585,9031,5615,1467,1306,7928
1292,7815,1812,9275,2783,9233,535,7363,4352,1949
7099,3466,8243,5733,7607,590,3114,65,4794,2662
9511,1027,5355,1522,9513,9939,553,5128,1405,1858
3055,2697,9673,4866,1971,2455,4099,2506,9817,8451
4454,6916,1916,2697,2649,9522,3287,5762,9587,8080
8424,9097,9107,3779,619,8620,3718,1171,3747,5123
3029,6801,7819,2701,1667,9790,5155,5765,2295,4972
4215,6749,1887,6131,9446,4536,5653,2732,298,5239
812,8722,4335,9918,2500,4953,8537,6217,6124,2284
1339,9153,9084,9158,1854,751,8947,7008,6516,1242
1980,731,7990,3867,6861,7435,8402,2513,167,8699
7751,978,7420,2086,896,9919,7038,9433,6136,3162
1716,7475,2314,800,6632,4167,1550,5579,1175,8065
6820,3155,8795,4810,7021,5656,2245,5423,8168,2411
4121,5919,3389,1541,8004,4284,1460,5042,3717,7595
8203,5432,5069,517,6231,1701,4684,7781,7279,5859
5846,4098,9013,4640,8908,6034,295,1152,1456,8463
3562,5577,4381,6951,7118,2385,1234,8577,7426,4950
6172,5629,382,1241,6146,6613,2941,830,4393,219
6688,238,4317,5701,4878,3224,1735,5173,4376,3190
3635,7937,8767,8016,4888,5884,400,6122,4461,7826
1072,633,3455,1453,1873,9600,8065,4813,429,2458
5032,7117,2695,9349,2817,7572,2573,4551,2745,6948
7741,6380,4885,6508,4395,9772,2392,4795,5893,6853
2621,6964,7485,6075,8417,9357,5674,6481,4170,6103
8939,9202,3219,1633,8550,6036,9205,1122,587,1949
8070,8328,8329,2954,4836,2723,2726,7227,7518,8618
4079,138,5582,1564,6212,3998,920,1886,479,5090
7989,9417,4291,1207,1050,2841,7243,255,3963,7829
2204,2032,6157,532,4986,992,3255,7711,8218,772
6329,2297,910,1911,3860,7122,5908,4780,9007,6387
9869,6995,5804,4159,8202,6854,6999,5444,7108,961
3273,9311,2993,9429,9842,7978,420,3096,5688,8638
3868,2017,934,4777,3927,4793,1898,9834,9573,905
6221,9441,7900,2025,3599,6102,8878,598,1546,5985
1558,4818,5295,4550,4247,5137,2528,4666,8233,8215
3304,2100,231,4237,6876,4158,9030,8774,3992,8602
9679,212,8042,7579,2236,1641,3681,1113,2238,5226
7098,3796,44,2392,8346,4290,7529,873,8956,5761
9088,2259,7860,9319,6495,4736,3476,5525,3510,7467
4127,3189,7679,2168,767,9915,3809,4447,1027,6046
9673,8125,9842,9716,517,8187,4005,8045,9060,2961
3805,8147,5219,1665,7466,1714,6401,941,7238,9910
8408,1365,3098,6086,3532,3865,6000,7341,8312,7027
3387,7984,5151,3228,7700,5667,1415,1705,3711,474
4665,7516,8621,9884,9181,6086,1597,5581,7026,8835
5491,5434,199,8589,1519,3731,2453,7518,1071,765
4544,4457,8748,9694,7684,6448,5361,9099,8152,9071
9572,2816,6587,8193,2699,5767,4278,4296,1348,1304
3130,6838,6737,3329,5426,8255,7059,7878,5773,8130
8642,317,2586,7390,10,270,3838,5371,9368,1989
4441,8940,4805,1028,7132,7504,6794,1410,1799,8142
2713,4929,4979,9450,8257,404,7705,5316,8282,3477
3445,6924,3793,6031,4313,3803,6300,8151,9173,5668
139,3614,4608,4943,4641,1739,2447,1435,3148,4245
9576,5861,9174,4554,5310,7431,4958,3015,2746,3239
6491,6191,162,284,2221,4475,4086,8521,2625,3259
4189,2764,6872,8796,7707,1513,534,153,2948,3682
4397,2523,9543,3571,7077,4853,1001,2035,7867,3746
5273,4358,9937,5435,4641,2157,9909,8727,678,2534
1985,4866,5297,8856,3661,3003,369,4195,3155,3316
7876,7552,5839,7419,1123,2916,2271,2123,4950,137
5869,223,4494,5805,5657,9135,7962,5566,7861,8639
8099,9845,3505,3396,8701,7165,6399,9069,1359,9554
2385,9235,7106,8223,6653,8228,1138,8923,350,6088
9060,6219,6310,3554,2023,1966,2688,9985,7532,549
8624,5631,393,2128,9026,9094,9292,5425,8163,651
4978,547,9885,2083,8769,6537,311,9907,5460,661
5994,4520,6879,2304,8074,8902,4269,762,8886,1800
1310,7510,7431,1703,9637,6456,796,8928,1881,8958
9579,6858,9505,9463,8941,8273,6000,9252,8180,1460
9912,4173,5979,6790,6477,4053,5691,745,4814,4577
2545,6124,2086,9975,7826,1722,6431,8622,650,8311
7580,228,5169,7084,9691,4110,5357,5690,3361,3536
7150,3272,7709,3129,62,4185,7181,5752,4930,1995
329,7475,8118,2415,7450,5944,4137,3881,4566,4787
2191,2146,5015,7360,9229,4705,1470,4586,395,4830
8122,7544,8102,5830,672,8163,15,7853,3915,4945
9847,4244,2419,7964,6658,9869,3908,794,3749,8474
5580,5940,619,595,3299,9848,5299,4768,4433,5693
9598,2554,3237,7699,8384,3908,5862,8399,1760,9776
3343,1607,4019,5762,9571,677,5630,3478,1470,9378
1952,7050,5317,2570,7644,8616,2417,2943,3384,6850
8636,2981,9403,1872,680,7787,5780,6541,6185,7540
6317,9528,9146,336,5289,8716,1012,919,2194,2481
297,4145,9531,5614,6715,7175,4229,9131,117,7613
5980,8752,594,5383,623,1273,3169,6403,7814,9354
3942,4131,8881,3087,4466,4170,1803,5477,5088,3997
7958,5384,8141,7488,997,4856,4662,5226,3986,4779
2838,9966,3530,3431,5349,4153,4704,8518,555,2518
7871,4496,6648,6752,7583,1114,921,9386,6590,6008
3382,4547,1392,1523,2035,2389,6378,6697,7614,364
1476,452,330,5005,3883,5678,9158,8586,4195,9712
1104,2066,4208,7751,8817,1791,8864,9737,1176,5454
5745,4558,1,7137,6080,2036,9525,2458,8733,7139
2821,208,7590,3151,5213,1472,8828,4370,58,3023
4082,1161,5088,8290,8912,3904,80,7776,3641,1256
3229,9386,5813,3230,6522,1893,5265,6047,4351,3998
3185,7172,4205,774,322,9417,2246,9149,3787,2303
2171,7868,3463,7259,6157,2374,1162,6237,150,4803
7493,3379,4188,3306,6608,710,5199,1873,6756,9549
5870,9940,6720,74,714,7041,9491,2959,6190,3277
5261,8361,1145,8724,5619,7301,1098,6781,3538,1247
1583,1031,4625,5770,4336,1232,6480,9534,3104,3235
9082,8974,3175,5802,9047,3888,2843,8537,6847,9033
1814,2107,7393,2958,830,3011,259,1928,9791,3796
3174,1374,4826,7798,7143,9162,9030,3622,8695,2134
6857,7777,1107,31,3579,154,3919,6421,8690,765
5453,504,2872,2846,3461,3702,5857,3719,5629,5647
7515,8802,7021,2341,6600,4163,1502,5629,7785,197
7762,4642,7974,8868,4673,1553,9021,8591,7973,7711
9355,3426,8215,2226,6272,1675,5927,2128,5394,1556
7775,2909,357,4795,5249,6956,8958,6751,2585,6743
6948,346,1384,4922,9214,6056,6474,8235,4646,4447
5946,4001,7873,4160,6227,4144,5835,2154,6271,1229
3709,4045,4137,4066,8840,9386,1021,7797,6137,3605
4539,3085,3951,5922,8006,3165,1978,4479,1400,6624
8926,7345,624,6798,1505,6851,942,7340,9004,7212
8568,2712,1257,2704,6777,96,2090,7798,7892,8226
1403,2431,1310,5354,8353,9316,8518,330,3795,9917
6953,2720,7262,7577,9518,8767,4427,459,6106,3431
7671,4674,6142,8927,7378,2919,9023,9467,717,6915
7693,2119,9345,9003,7472,7697,8318,5990,8027,2113
5907,4980,4833,3169,2557,4350,1935,6984,4809,8041
414,2479,2715,6556,1406,93,9474,428,9559,191
7343,7252,2309,6688,6255,9781,4385,4573,5771,2411
6685,1677,7391,1517,4846,9947,5866,6781,6930,674
4822,7343,3153,7536,3899,4558,7628,3372,4986,7187
3563,2329,4439,5871,9016,693,5652,3400,5265,1423
5811,1949,3100,3201,3466,7945,3148,9331,4725,77
5,9547,7420,3158,7083,1318,7715,4710,4690,2701
1897,8252,5029,6335,4123,4044,7028,9775,7444,2293
1197,3254,4241,4296,6454,7706,2241,9601,7037,6966
9678,7042,6512,7098,200,3594,8416,7915,8304,3106
615,201,1358,5644,6536,5481,9687,3563,5255,7131
5855,6452,384,96,748,6838,7802,2989,6439,4839
9954,6116,1881,6465,3214,2080,59,1630,9994,8363
4735,609,8563,6093,6252,5098,1573,5939,8660,6828
3069,4515,3280,3452,4610,4027,289,2412,7015,6727
7250,6969,2843,9130,3434,6057,1210,3492,7686,1203
1855,2421,1811,417,8514,8062,5514,87,4001,4174
6914,7069,8688,193,521,3298,4220,809,5710,1235
7536,2959,8204,379,2089,1637,6435,3298,5129,4121
4501,6983,6542,6311,7399,5056,4373,2913,5142,8373
7086,2056,5442,5774,2248,5962,9072,6468,6771,4781
7703,4306,7740,5906,4685,9828,7542,1120,3126,2671
5240,7626,9653,1782,3936,7051,6838,8309,9964,1979
6682,7049,4034,2123,2823,6282,8084,1894,2750,4854
6674,452,9160,4413,6358,3844,4241,3900,4963,7366
6570,203,4991,6222,1985,8927,3273,8822,7236,3236
800,3917,285,4834,6040,3107,1115,4124,5000,3864
8977,1674,4316,8137,6087,673,1980,327,4572,6943
7693,1141,7146,2684,7363,9130,1611,636,7951,8846
3871,8751,2763,4155,3584,8802,7262,4699,2925,2261
8562,1902,3935,2878,38,21,3550,2018,348,8122
8961,8040,9263,6106,724,6626,5235,2334,7261,3186
1179,1131,1937,3942,5286,5521,2743,2547,219,5668
4808,8781,7569,8742,1658,7607,8763,5208,9625,9110
3330,8585,7150,2592,4691,7873,9217,9926,206,6478
3111,1385,7609,5048,5326,2894,568,8069,5441,786
3736,249,9567,1305,8991,1225,8911,7753,6433,8535
6863,9762,7120,4012,2354,1810,1885,1571,1735,2091
8048,4846,3476,5656,9894,8801,8550,461,6870,3990
1247,605,4239,813,1909,3229,2038,820,981,8470
9355,7843,8231,6475,1855,584,8285,3740,2155,20
5830,202,4865,9305,5858,4758,8106,4407,5219,4975
8397,6465,5580,2635,7278,7489,5863,9316,8308,6844
7785,7663,4687,6015,4137,6541,6599,2421,280,8753
2440,6110,8955,7305,5414,4812,2063,3520,9218,7281
8494,7614,3746,4074,249,1024,1562,6112,339,9869
2955,8123,7531,7642,4138,1667,4182,736,4088,4462
9489,6527,572,8443,3831,5986,3254,5893,9505,2472
3174,7999,85,6919,2072,334,7942,3633,6445,8281
3501,9400,6403,1032,7041,541,2699,1223,1276,6786
5685,765,3313,6256,9207,7144,2241,2461,3036,1746
4932,6210,9744,5017,3128,1815,5350,1070,5447,1795
9351,8948,1194,5753,9980,8235,6293,2679,9457,7569
9464,5141,8333,2777,1397,7540,9920,3637,10000,2956
5382,4932,9165,5126,9948,2293,6940,5298,3362,2387
7092,2712,1334,8286,8465,1314,6520,4758,3992,5976
2327,3456,1117,660,6232,2513,8199,6151,6150,8199
9107,1532,3131,8271,6657,3078,563,3597,8375,3925
5983,5467,6637,7317,3752,5101,8630,271,9859,2621
6247,2185,6076,7364,2844,2307,9877,1043,8458,6026
9242,7564,7558,2372,5835,4215,5450,6398,7811,3825
322,3793,9291,6958,1110,3043,2059,9739,3314,1917
2359,9560,4102,8434,6924,6945,741,6800,7988,9198
2826,7230,6762,384,9601,2597,4598,5051,8994,2409
8875,9315,6202,8166,6273,7311,1209,8332,7049,4522
248,9407,4082,4349,7841,1005,1294,8581,7805,9282
7779,630,6511,4541,1013,6112,7137,5611,1163,6130
8019,38,5445,4220,8203,1718,1530,9411,49,8578
3933,297,7985,8014,4645,5825,9019,5939,4405,6823
5221,2184,7452,1732,6724,8465,7844,3860,4075,9006
9990,2093,9043,5434,6312,7246,7152,7842,6657,7200
6419,589,7496,4404,8603,2141,228,7621,8080,4633
4443,3301,6816,1895,5032,3539,359,2875,7399,4434
1881,7388,6526,924,2822,2838,8169,9974,679,4826
7173,7098,5414,4669,1501,4016,6809,1729,1637,4889
6362,6080,8189,3178,7974,3220,6716,8333,6095,4115
2766,7975,1503,9291,8899,4325,2129,7067,4298,2807
1892,1470,9905,7306,6138,1406,1322,2947,3134,2958
7835,9495,9037,6023,2672,7011,9243,9388,5343,5338
3503,8108,3313,5005,7398,2211,9330,9526,9277,3627
2333,1169,5097,2237,8474,1235,3642,9796,4181,6776
2753,2016,6271,1790,8038,8943,8800,7281,8331,4142
2618,1833,2250,5930,6838,9648,8140,6167,9173,7417
9794,1506,8585,4890,3743,7059,6124,7384,6854,304
4160,9607,2320,430,1397,357,9373,197,7638,7703
4338,255,9536,6587,6184,6373,6234,4324,2540,5407
1740,2333,6913,325,7222,655,7384,3345,8039,4238
3649,2199,3844,5968,2628,5241,6325,2001,5437,3962
9703,9775,4217,9238,6362,401,5611,2596,4724,8150
8003,6464,482,4915,6788,7704,5570,4171,1049,3608
8408,4698,5806,2252,666,8434,7493,6991,434,2929
952,137,2703,5169,9375,9065,5569,4985,1660,293
3134,9662,6756,3616,4577,3544,1320,146,7715,2368
3754,6123,7066,9560,8375,7731,7993,5867,4721,8427
8796,5673,8564,1499,841,7938,563,6410,2922,2222
6703,6056,1884,3459,9672,6460,7003,991,6605,4717
3359,358,840,424,9917,9214,8155,7910,5081,2875
6337,3876,8548,4901,5375,9389,2838,5937,5799,5759
8158,2501,1815,42,5960,1486,6501,2962,2477,3106
7679,5836,3464,8519,6259,3381,7733,4414,1290,2813
7289,7627,6689,5836,2527,2063,5224,5364,7999,1022
1123,6157,3523,2938,6198,9482,4424,2699,2444,6900
5804,122,2735,9267,8640,8994,2647,6372,3407,3937
9185,695,1564,5874,6530,4090,7936,1754,9454,5935
2776,577,2092,6299,3515,8290,5780,7938,988,8224
4837,6792,8346,7572,6059,6986,6565,8705,3357,9972
2642,2542,666,4205,8415,7196,8295,6351,8950,7749
2286,1725,8326,4377,8023,1841,2667,3803,9778,3655
2026,4615,446,372,2186,6504,7357,8750,5209,714
8721,7851,3255,9387,2056,1670,6583,351,8020,5532
8100,306,7257,6425,4682,5279,8266,7348,9082,8043
1002,1108,2657,1448,1479,4842,7952,8835,3592,3160
9548,2313,1011,2803,1699,3066,4472,8282,3416,2492
3813,1515,2797,1069,7940,7479,6348,6205,4826,5430
4248,5828,6538,6904,7276,8016,1746,5227,6851,5337
8387,6398,7650,9397,9200,9348,2462,3672,7630,5877
6163,1442,7392,8959,2511,5332,6438,8859,1536,1263
4289,5783,7091,826,2687,4366,8842,4432,9593,5692
9769,7979,2089,7418,7375,1289,6766,9836,4960,4395
5713,1123,5837,3105,81,8348,8436,6518,7207,9972
7781,1495,5755,4872,2321,8441,9238,1162,2873,8830
6853,2641,6809,8941,58,4183,229,6823,4019,5189
1217,9731,6311,7054,2835,6392,5401,1271,2910,2607
1242,691,4101,6996,5563,6422,5436,4800,7583,8308
3630,4435,948,438,3375,1006,4620,3604,7828,8639
8793,9045,8369,5103,6099,1204,1495,1499,2474,4404
4105,3715,5095,8206,710,657,4627,6146,5456,2210
4454,9086,6644,5402,9523,19,6407,4143,3623,4235
2781,2415,3280,1150,7518,9378,2353,9012,877,4827
3416,4982,8542,8510,3188,9251,9166,7815,5397,4622
24,9850,3707,6667,5252,3230,6685,1658,7373,307
5893,154,2722,9172,1303,239,8550,3656,9250,9426
8482,2665,4408,7023,1175,7595,6274,340,5409,1671
4961,5432,1521,8668,2099,6772,1897,8784,8429,9269
9090,4322,9423,1812,3494,725,2050,2043,4381,1300
1469,2862,3965,5876,9885,5139,3470,6159,5478,8879
7830,439,4311,9350,9106,6409,6121,1003,5192,4550
272,4282,8872,9694,6093,2365,419,8142,4407,4799
9441,5876,7661,3405,1751,7546,8544,5221,3704,4021
4099,1534,4460,8409,883,3566,4818,7004,4569,9
1553,4840,4290,424,4534,383,2789,4952,8524,7195
9751,7965,3070,7411,1370,4821,4956,9913,41,8660
3934,4140,193,8393,2548,1075,1959,7365,8078,6527
7374,9631,1367,1663,55,5901,2046,2843,852,569
38,602,8534,3108,8013,9903,7928,2968,9816,7968
1627,3749,2108,1820,2142,4655,2894,4100,2020,972
627,9393,603,1994,1056,658,7894,3101,3501,8746
3670,3539,9348,2203,6646,7360,2106,4574,328,1921
2542,1955,5669,4649,3774,7811,9303,6668,1910,1323
7640,2537,715,8243,4531,1771,8901,2424,4871,2401
1170,8540,5940,517,743,2585,7877,2848,7158,8204
4768,9699,159,437,4347,3932,8247,3650,600,157
4972,8239,2694,5687,6482,7224,7457,5382,9647,2328
7782,816,868,3721,1333,1610,6306,9209,4458,3464
7413,9226,3163,7571,9663,7509,1503,7909,1159,2102
8066,6131,340,759,1818,6821,7982,9275,2203,7629
1602,9984,8445,2470,3705,9777,4080,11,8986,8537
3474,6398,7763,6636,3968,7425,4145,5470,5334,5304
7572,3399,1434,7912,4157,3252,4733,2139,2526,6935
9767,4128,6918,8211,6597,623,7988,676,633,6973
9213,4107,3370,6975,742,7338,4400,4887,2808,9733
190,379,3132,1623,8290,7289,4875,3023,9427,7400
9957,9194,1527,6875,7404,8123,7497,5391,8799,8130
2364,8011,2236,5733,4986,2978,3071,9385,7864,5879
9118,8053,6258,2249,9676,4548,9537,4550,7570,8964
1949,7526,8157,3476,4400,5560,1598,1897,951,396
26,3314,8407,2262,9047,3392,5239,2118,2776,3103
7996,1893,1155,4253,4142,831,8801,3678,5380,6370
2642,7329,3895,798,804,8295,6358,2402,191,7308
2798,217,622,1204,2478,9669,4596,7717,1786,7371
819,9782,9264,1973,4035,3406,2804,2835,7084,8183
9204,9725,5512,3099,522,6316,1393,6879,8718,1584
4186,1516,1800,4808,2720,4277,4476,7315,1994,6262
4686,2812,6043,3950,4785,77,7355,7588,2912,4438
5771,2115,4162,1282,5214,4683,7598,6607,1562,6316
8190,5748,7831,9989,555,550,4266,5031,7864,6259
1292,2550,9070,7335,6499,3854,7411,3853,1442,323
8290,7212,2438,2452,8494,7651,7135,6092,4257,8696
2407,2446,4443,237,2434,4997,787,6700,28,8650
2958,1319,1199,2028,8653,7697,5882,6064,1550,7323
6386,9840,4535,8823,2291,3029,6473,9425,9120,730
8120,1527,3175,2562,1763,5609,7559,2549,2308,7586
1199,5266,8905,2398,7293,7557,95,3174,3621,1644
497,6,1483,5031,8829,3774,8059,5301,3198,7179
6031,1317,8705,9205,3879,468,4814,1438,3017,7122
9023,4216,2388,7928,6613,9680,5484,6708,2854,9105
EOT;


        $htmlReader = new HtmlReader();
        $table2csv = $htmlReader->load($table);

        $this->assertEquals($csv, $table2csv);
    }
}
