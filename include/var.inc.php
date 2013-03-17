
<?php
/*
Eclipse Distribution License - v 1.0

Copyright (c) 2007, Eclipse Foundation, Inc. and its licensors.

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
    Neither the name of the Eclipse Foundation, Inc. nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. 

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/
@$header = "
<head>
<link rel=\"stylesheet\" href=\"static/style.css\">
<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>
<!--[if lt IE 9]><script src\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
<script type=\"text/javascript\" src=\"include/prettify.js\"></script>                                   
<script type=\"text/javascript\" src=\"include/kickstart.js\"></script>
<link rel=\"stylesheet\" href=\"static/kickstart.css\">
<title>Evony map :: DrWhat Project ::0.0.9 </title>
</head>
<body>
<div id=\"ribbon\">
<h1><u>:: EvoMap ::</u></h1>
<h2></div><div id=\"main\">$log
<h3> This is a DrWhat project, this project is protect under the <a href=\"http://www.eclipse.org/org/documents/epl-v10.php\">Eclipse Public License - v 1.0</a></h3>
</br><hr>
Any suggestions Email: DrWhat@Cryto.net";

$servers = "
<section><fieldset>
<legend>Select Server</legend>
<dd>
<select name=\"SID\" id=\"SID\">
<option value=\"\" selected=\"selected\">Choose Server</option>
<option value=\"258\">Zweihander(World na24)</option><option value=\"204\">Xiphos(World na2)</option><option value=\"321\">War-Scythe(World na43)</option><option value=\"243\">Wakizashi(World na20)</option><option value=\"241\">Vambrace(World na17)</option><option value=\"210\">Trident(World na6)</option><option value=\"215\">Tomahawk(World na11)</option><option value=\"324\">Targe(World na44)</option><option value=\"317\">Talwar(World na41)</option><option value=\"205\">Spatha(World na3)</option><option value=\"217\">Shuriken(World na13)</option><option value=\"256\">Scuta(World na23)</option><option value=\"206\">Scimitar(World na4)</option><option value=\"295\">Schiavona(World na35)</option><option value=\"211\">Saber(World na8)</option><option value=\"282\">Rapier(World na29)</option><option value=\"327\">Partizan(World na45)</option><option value=\"242\">Messer(World na18)</option><option value=\"271\">Martel(World na27)</option><option value=\"291\">Lucerne(World na34)</option><option value=\"218\">Longbow(World na14)</option><option value=\"203\">Khopesh(World na1)</option><option value=\"310\">Katar(World na39)</option><option value=\"207\">Javelin(World na5)</option><option value=\"272\">Hallstatt(World na28)</option><option value=\"284\">Halberd(World na30)</option><option value=\"212\">Glaive(World na9)</option><option value=\"221\">Gauntlet(World na16)</option><option value=\"338\">Francisca(World na47)</option><option value=\"220\">Flamberge(World na15)</option><option value=\"296\">Falchion(World na36)</option><option value=\"269\">Falcata (World na26)</option><option value=\"216\">Estoc(World na12)</option><option value=\"267\">Espada(World na25)</option><option value=\"318\">Epee(World na42)</option><option value=\"314\">Cutlass(World na40)</option><option value=\"213\">Cuirass(World na10)</option><option value=\"244\">Claymore(World na21)</option><option value=\"286\">Chamfron(World na31)</option><option value=\"298\">Cestus(World na37)</option><option value=\"308\">Broadsword(World na38)</option><option value=\"255\">Battleaxe(World na22)</option><option value=\"289\">Bardiche(World na33)</option><option value=\"209\">Balisong(World na7)</option><option value=\"229\">Assegai(World na19)</option><option value=\"287\">Arbalest(World na32)</option><option value=\"111\">World wn4</option>                
<option value=\"104\">World wn3</option><option value=\"99\">World wn2</option><option value=\"94\">World wn1</option><option value=\"70\">World w26</option><option value=\"65\">World w25</option><option value=\"63\">World w24</option><option value=\"60\">World w23</option><option value=\"58\">World w22</option><option value=\"57\">World w21</option><option value=\"54\">World w20</option><option value=\"53\">World w19</option><option value=\"44\">World w18</option><option value=\"43\">World w17</option><option value=\"42\">World w16</option><option value=\"39\">World w15</option><option value=\"36\">World w14</option><option value=\"37\">World w13</option>                
<option value=\"33\">World w12</option><option value=\"32\">World w11</option><option value=\"31\">World w10</option><option value=\"30\">World w09</option><option value=\"29\">World w08</option><option value=\"28\">World w07</option><option value=\"24\">World w06</option><option value=\"23\">World w05</option><option value=\"22\">World w04</option><option value=\"21\">World w03</option><option value=\"20\">World w02</option>                
<option value=\"19\">World w01</option><option value=\"184\">World ss9</option><option value=\"183\">World ss8</option><option value=\"331\">World ss70</option><option value=\"182\">World ss7</option><option value=\"329\">World ss69</option><option value=\"328\">World ss68</option><option value=\"330\">World ss67</option><option value=\"305\">World ss66</option><option value=\"304\">World ss65</option><option value=\"303\">World ss64</option><option value=\"302\">World ss63</option><option value=\"301\">World ss62</option><option value=\"300\">World ss61</option><option value=\"281\">World ss60</option><option value=\"181\">World ss6</option><option value=\"280\">World ss59</option><option value=\"279\">World ss58</option><option value=\"278\">World ss57</option><option value=\"277\">World ss56</option><option value=\"276\">World ss55</option><option value=\"275\">World ss54</option><option value=\"274\">World ss53</option><option value=\"266\">World ss52</option>
<option value=\"253\">World ss51</option><option value=\"265\">World ss50</option><option value=\"174\">World ss5</option><option value=\"252\">World ss49</option><option value=\"264\">World ss48</option><option value=\"251\">World ss47</option><option value=\"263\">World ss46</option><option value=\"248\">World ss45</option><option value=\"247\">World ss44</option><option value=\"262\">World ss43</option><option value=\"246\">World ss42</option><option value=\"261\">World ss41</option><option value=\"250\">World ss40</option><option value=\"173\">World ss4</option><option value=\"260\">World ss39</option><option value=\"259\">World ss38</option><option value=\"249\">World ss37</option><option value=\"240\">World ss36</option><option value=\"239\">World ss35</option><option value=\"232\">World ss34</option><option value=\"231\">World ss33</option><option value=\"230\">World ss32</option><option value=\"235\">World ss31</option><option value=\"234\">World ss30</option><option value=\"172\">World ss3</option><option value=\"233\">World ss29</option><option value=\"238\">World ss28</option><option value=\"237\">World ss27</option><option value=\"236\">World ss26</option>
<option value=\"200\">World ss25</option><option value=\"199\">World ss24</option><option value=\"198\">World ss23</option><option value=\"197\">World ss22</option><option value=\"196\">World ss21</option><option value=\"195\">World ss20</option><option value=\"171\">World ss2</option><option value=\"194\">World ss19</option><option value=\"193\">World ss18</option><option value=\"192\">World ss17</option><option value=\"191\">World ss16</option><option value=\"190\">World ss15</option><option value=\"189\">World ss14</option><option value=\"188\">World ss13</option><option value=\"187\">World ss12</option><option value=\"186\">World ss11</option><option value=\"185\">World ss10</option><option value=\"166\">World ss1</option><option value=\"226\">World pt1</option><option value=\"336\">World na46</option><option value=\"162\">World n4</option><option value=\"156\">World n3</option><option value=\"154\">World n2</option><option value=\"120\">World n1</option><option value=\"224\">World fr1</option><option value=\"225\">World es1</option><option value=\"223\">World de1</option><option value=\"222\">World ch1</option><option value=\"227\">World all1</option><option value=\"340\">World 172</option><option value=\"339\">World 171</option><option value=\"337\">World 170</option><option value=\"335\">World 169</option><option value=\"334\">World 168</option><option value=\"326\">World 167</option><option value=\"323\">World 166</option><option value=\"322\">World 165</option><option value=\"320\">World 164</option><option value=\"319\">World 163</option><option value=\"316\">World 162</option><option value=\"313\">World 161</option><option value=\"311\">World 160</option><option value=\"309\">World 159</option><option value=\"307\">World 158</option><option value=\"306\">World 157</option><option value=\"299\">World 156</option><option value=\"297\">World 155</option><option value=\"292\">World 154</option><option value=\"290\">World 153</option><option value=\"288\">World 152</option><option value=\"285\">World 151</option><option value=\"283\">World 150</option><option value=\"273\">World 149</option><option value=\"270\">World 148</option><option value=\"268\">World 147</option><option value=\"257\">World 146</option><option value=\"254\">World 145</option><option value=\"245\">World 144</option><option value=\"228\">World 143</option><option value=\"219\">World 142</option><option value=\"214\">World 141</option><option value=\"202\">World 140</option><option value=\"201\">World 139</option><option value=\"180\">World 138</option><option value=\"179\">World 137</option><option value=\"178\">World 136</option><option value=\"177\">World 135</option>
<option value=\"175\">World 134</option><option value=\"170\">World 133</option><option value=\"169\">World 132</option><option value=\"168\">World 131</option><option value=\"167\">World 130</option><option value=\"165\">World 129</option><option value=\"164\">World 128</option><option value=\"163\">World 127</option><option value=\"161\">World 126</option><option value=\"160\">World 125</option>
<option value=\"159\">World 124</option><option value=\"158\">World 123</option><option value=\"157\">World 122</option><option value=\"155\">World 121</option><option value=\"153\">World 120</option><option value=\"152\">World 119</option><option value=\"151\">World 118</option><option value=\"150\">World 117</option><option value=\"149\">World 116</option><option value=\"148\">World 115</option><option value=\"147\">World 114</option><option value=\"146\">World 113</option><option value=\"145\">World 112</option><option value=\"144\">World 111</option><option value=\"143\">World 110</option><option value=\"142\">World 109</option><option value=\"141\">World 108</option><option value=\"140\">World 107</option><option value=\"139\">World 106</option><option value=\"138\">World 105</option><option value=\"137\">World 104</option><option value=\"136\">World 103</option>
<option value=\"135\">World 102</option><option value=\"134\">World 101</option><option value=\"133\">World 100</option><option value=\"132\">World 099</option><option value=\"131\">World 098</option><option value=\"130\">World 097</option><option value=\"129\">World 096</option><option value=\"128\">World 095</option>
<option value=\"127\">World 094</option><option value=\"126\">World 093</option><option value=\"125\">World 092</option><option value=\"124\">World 091</option><option value=\"123\">World 090</option>
<option value=\"122\">World 089</option><option value=\"121\">World 088</option><option value=\"119\">World 087</option><option value=\"118\">World 086</option><option value=\"80\">World 085</option><option value=\"117\">World 084</option><option value=\"116\">World 083</option><option value=\"115\">World 082</option><option value=\"114\">World 081</option><option value=\"113\">World 080</option><option value=\"112\">World 079</option><option value=\"110\">World 078</option><option value=\"109\">World 077</option><option value=\"108\">World 076</option><option value=\"107\">World 075</option><option value=\"106\">World 074</option><option value=\"105\">World 073</option><option value=\"103\">World 072</option><option value=\"102\">World 071</option><option value=\"101\">World 070</option><option value=\"100\">World 069</option><option value=\"98\">World 068</option><option value=\"97\">World 067</option><option value=\"96\">World 066</option><option value=\"95\">World 065</option><option value=\"93\">World 064</option><option value=\"92\">World 063</option><option value=\"91\">World 062</option><option value=\"90\">World 061</option><option value=\"89\">World 060</option><option value=\"88\">World 059</option><option value=\"87\">World 058</option><option value=\"86\">World 057</option><option value=\"85\">World 056</option><option value=\"84\">World 055</option>
<option value=\"83\">World 054</option><option value=\"82\">World 053</option><option value=\"81\">World 052</option><option value=\"79\">World 051</option><option value=\"78\">World 050</option><option value=\"77\">World 049</option><option value=\"76\">World 048</option><option value=\"75\">World 047</option><option value=\"74\">World 046</option><option value=\"73\">World 045</option><option value=\"72\">World 044</option><option value=\"71\">World 043</option><option value=\"69\">World 042</option><option value=\"67\">World 041</option><option value=\"68\">World 040</option><option value=\"66\">World 039</option><option value=\"64\">World 038</option><option value=\"62\">World 037</option><option value=\"61\">World 036</option><option value=\"59\">World 035</option><option value=\"56\">World 034</option><option value=\"55\">World 033</option><option value=\"52\">World 032</option><option value=\"51\">World 031</option><option value=\"50\">World 030</option><option value=\"49\">World 029</option><option value=\"48\">World 028</option><option value=\"47\">World 027</option><option value=\"46\">World 026</option><option value=\"45\">World 025</option><option value=\"41\">World 024</option><option value=\"40\">World 023</option><option value=\"35\">World 022</option><option value=\"34\">World 021</option><option value=\"27\">World 020</option><option value=\"26\">World 019</option><option value=\"25\">World 018</option><option value=\"18\">World 017</option><option value=\"17\">World 016</option><option value=\"16\">World 015</option><option value=\"15\">World 014</option><option value=\"14\">World 013</option><option value=\"13\">World 012</option><option value=\"12\">World 011</option><option value=\"11\">World 010</option><option value=\"10\">World 009</option><option value=\"9\">World 008</option><option value=\"8\">World 007</option><option value=\"7\">World 006</option><option value=\"6\">World 005</option><option value=\"5\">World 004</option><option value=\"4\">World 003</option><option value=\"3\">World 002</option><option value=\"1\">World 001</option>
</select><br>
<button type=\"submit\" >Select Server
</dd></fieldset></section></form>";
$tableplayers = "
<table class=\"striped tight sortable\"></br>
<thead>
<tr>
<th>xxx,yyy |</th>
<th>City Name |</th>
<th>Lord Name |</th>
<th>Allaince |</th>
<th>Status |</th>
<th>Flag |</th>
<th>Honor |</th>
<th>Prestige |</th>
<th>Disposition</th>
</tr>
</thead>
<tbody>";
$tableplayers = "
<table class=\"striped tight sortable\"></br>
<thead>
<tr>
<th>Server |</th>
<th>Lord Name |</th>
<th>Allaince |</th>
<th>Honor |</th>
<th>Prestige |</th>
</tr>
</thead>
<tbody>";
$alliance = htmlspecialchars(stripslashes($alliance));
$lord = htmlspecialchars(stripslashes($lord));
$city = htmlspecialchars(stripslashes($city));
$flag = htmlspecialchars(stripslashes($flag));
$SID = ( isset ($_POST['SID'] ) === true ) ? $_POST['SID'] : '';
$form ="
<section><fieldset>
<legend>Search</legend>
<label for=\"s\">Lord Name</label>
<input id=\"lord\" value=\"$lord\" type=\"text\" name=\"lord\"></br>
<label for=\"s\">City Name</label>
<input id=\"city\" value=\"$city\" type=\"text\" name=\"city\"></br>
<label for=\"s\">Alliance Name</label>
<input id=\"alliance\" value=\"$alliance\" type=\"text\" name=\"alliance\"></br>
<label for=\"s\">Flag</label>
<input id=\"flag\" value=\"$flag\" type=\"text\" name=\"flag\"></br>
<input name=\"SID\" type=\"hidden\" value=\"$SID\">
<button type=\"submit\" >Submit</fieldset></section></form>";

$footer="
</tbody>
</table> 
</div><hr>&copy DrWhat 2013
<p><br></body>";
?>