<?php
class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    public function longestCommonPrefix($array)
    {
        if(empty($array)){
            return '';
        }
        $count = count($array);
        $common = '';
        if ($count > 1) {
            if ($array[0] == '' && $array[1] == '') {
                return '';
            }
            if ($array[0][0] != $array[1][0]) {
                return '';
            }
            $len = strlen($array[0]);
            $len2 = strlen($array[1]);
            $count2 = $len > $len2 ? $len2 : $len;
            $common = '';
            for ($len2 = 0; $len2 < $count2; $len2++) {
                if ($array[0][$len2] == $array[1][$len2]) {
                    $common .= $array[0][$len2];
                } else {
                    break;
                }
            }

            if (!empty($common) && $count > 2) {
                for ($i = 2; $i < $count; $i++) {
                    if ($array[$i] == '') {
                        return '';
                    }
                    if ($common == $array[$i]) {
                        continue;
                    } else {
                        $len3 = strlen($array[$i]);
                        $data = $len2 > $len3 ? substr($array[$i], 0, $len3) : substr($array[$i], 0, $len2);
                        if ($data == $common) {
                            continue;
                        } else {
                            $len4 = strlen($data);
                            $common = substr($common, 0, $len4);
                            for ($k = 0; $k < $len4; $k++) {
                                if ($common[$k] == $data[$k]) {
                                    continue;
                                } else {
                                    $len2 = $k;
                                    $common = substr($common, 0, $k);
                                    break;
                                }
                            }
                        }
                    }
                }
            }
            if ($common) {
                return $common;
            } else {
                return '';
            }
        } else {
            return $array[0];
        }
    }
}

$array = ["aaaaaeaal","aaqaauaaa","abaajaaj","aataaiaap","aakaafaaz","aaoaaxaaa","aabaacaaq","aauaamaau","aayaapaap","aahaazaao","aaaaaaaam","aaeaanaax","aacaahaak","aalaahaas","aawaaiaal","aaaaasaav","aayaasaar","aawaaxaaq","aapaahaab","aabaaraaa","aaraauaay","aafaabaam","aajaadaaa","aawaaoaat","aalaavaau","aauaaeaac","aapaakaaj","aasaaoaag","aaoaagaas","aazaadaap","aaxaanaax","aavaaeaal","aaxaapaag","aadaavaan","aamaaiaam","aahaahaam","aafaapaag","aagaacaar","aazaaaaas","aadaakaaj","aataalaai","aaeaaxaan","aawaagaak","aamaawaan","aanaafaaz","aataagaaq","aapaadaab","aaoaahaad","aamaagaab","aataafaad","aaiaadaai","aafaahaaz","aauaaaaai","aabaauaah","aabaafaaz","aazaahaay","aanaajaam","aajaamaat","aanaataaw","aalaaaaae","aawaahaam","aabaaaaal","aaiaadaab","aayaasaak","aacaaqaag","aadaafaax","aapaaxaan","aajaaxaai","aaiaaoaam","aazaagaad","aataauaag","aasaaqaay","aanaabaai","aaqaauaad","aapaamaaa","aaraawaak","aahaazaah","aasaanaah","aaqaaiaau","aakaamaah","aauaasaas","aakaahaan","aaraaiaaw","aawaavaaq","aayaacaas","aayaadaam","aaqaaeaau","aayaakaag","aauaaqaas","aazaahaau","aadaafaae","aagaaxaah","aaraagaai","aapaabaam","aaoaavaao","aaqaapaas","aafaajaak","aaraabaay","aawaaqaaj","aasaanaab","aasaawaau","aasaagaao","aawaaraac","aabaaxaaj","aapaafaah","aazaabaaw","aabaataaq","aaxaayaab","aafaavaaj","aasaaaaay","aaoaadaai","aabaamaaz","aakaagaal","aakaaeaas","aaaaaraai","aapaafaag","aahaaiaar","aamaadaan","aaraawaag","aaaaafaae","aalaaqaat","aahaaoaal","aafaawaae","aadaakaag","aaoaaxaag","aanaafaae","aamaaoaan","aajaaqaar","aacaalaal","aadaaaaae","aafaaqaat","aasaaqaaf","aaeaafaad","aaaaapaad","aakaauaav","aafaaeaag","aapaauaap","aadaalaaf","aagaaqaaf","aaraaraac","aaraaaaah","aanaagaav","aaqaahaav","aavaaiaaa","aafaagaag","aataadaah","aajaapaaa","aaaaafaae","aaxaacaaf","aagaazaam","aaoaaraal","aakaaqaab","aaiaataan","aasaakaal","aaoaasaah","aadaataaf","aaxaauaaj","aayaalaay","aagaamaah","aakaamaar","aamaajaaf","aakaalaaq","aabaadaai","aazaanaam","aaoaagaaa","aanaapaas","aavaasaay","aahaalaar","aayaabaaq","aaraaaaam","aapaawaae","aamaaqaap","aagaapaan","aafaadaae","aayaayaak","aaraahaaj","aanaagaaa","aadaapaax","aafaalaan","aanaauaab","aamaataad","aamaawaax","aapaahaai","aaraaeaat","aaiaakaab","aasaaaaaq","aauaabaac","aaeaalaac","aakaaiaam","aakaaoaac","aaqaadaat","aataapaam","aaeaafaah","aalaahaam","aaeaasaaj","aayaayaaj","aaeaafaaq","aawaaiaam","aawaasaav","aabaayaav"];


$obj = new Solution();
echo $obj->longestCommonPrefix($array);
