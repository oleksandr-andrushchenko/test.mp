<?php

function solution($B)
{
    $output = [
        0,
        0,
        0,
    ];

    $destroyers = [
        [
            ['#', '#', '#'],
        ],
        [
            ['#'],
            ['#'],
            ['#'],
        ],
        [
            ['#', '#'],
            ['#', '.'],
        ],
        [
            ['#', '#'],
            ['.', '#'],
        ],
        [
            ['#', '.'],
            ['#', '#'],
        ],
        [
            ['.', '#'],
            ['#', '#'],
        ],
    ];
    $submarines = [
        [
            ['#', '#'],
        ],
        [
            ['#'],
            ['#'],
        ],
    ];
    $boats = [
        [
            ['#'],
        ],
    ];

    $typesSets = [
        $destroyers,
        $submarines,
        $boats,
    ];

    $skipPoints = [];

    for ($i = 0, $li = count($B); $i < $li; $i++) {
        for ($j = 0, $lj = count($B[$i]); $j < $lj; $j++) {
            foreach ($typesSets as $index => $typesSet) {
                foreach ($typesSet as $types) {
                    $skipPointsAdd = [];

                    for ($id = 0, $lid = count($types); $id < $lid; $id++) {
                        for ($jd = 0, $ljd = count($types[$id]); $jd < $ljd; $jd++) {
                            $point = [[$i + $id], [$j + $jd]];

                            if ($types[$id][$jd] !== $B[$i + $id][$j + $jd] || in_array($point, $skipPoints, true)) {
                                continue 3;
                            }

                            $skipPointsAdd[] = $point;
                        }
                    }

                    $output[$index]++;
                    $skipPoints = array_merge($skipPoints, $skipPointsAdd);
                    break;
                }
            }
        }
    }

    return $output;
}

$solution = solution(
    [
        ['#', '#', '#' , '.', '#'],
        ['.', '.', '.' , '.', '#'],
        ['.', '#', '.' , '.', '#'],
        ['.', '.', '#' , '.', '.'],
        ['.', '.', '#' , '#', '.'],
    ]
);

var_dump($solution);die;
