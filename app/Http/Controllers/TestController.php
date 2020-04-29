<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Support\Facades\Http;

class TestController extends BaseController
{
    public function test()
    {
        $start = microtime(true);
        $path = './4.png';
//        $response = Http::withHeaders([
//            'apikey' => '48ba303be888957',
//        ])->attach(
//            'file', file_get_contents($path), '1.png'
//        )->post('https://api.ocr.space/parse/image', [
//                'language' => 'jpn',
//        ]);
        $imageAnnotator = new ImageAnnotatorClient(
            [
                'credentials' => json_decode(file_get_contents('./x.json'), true)
            ]
        );

        # annotate the image
        $image = file_get_contents($path);
        $response = $imageAnnotator->documentTextDetection($image);
        $annotation = $response->getFullTextAnnotation();

        # print out detailed and structured information about document text
        if ($annotation) {
            foreach ($annotation->getPages() as $page) {
                $text = '';
                foreach ($page->getBlocks() as $block) {
                    $block_text = '';
                    foreach ($block->getParagraphs() as $paragraph) {
                        foreach ($paragraph->getWords() as $word) {
                            foreach ($word->getSymbols() as $symbol) {
                                $block_text .= $symbol->getText();
                            }
                            $block_text .= ' ';
                        }
                        $block_text .= "\n";
                    }
                    $text .= $block_text;
                    printf('Block content: %s', $block_text);
                    printf('Block confidence: %f' . PHP_EOL,
                        $block->getConfidence());


                }
            }
        } else {
            print('No text found' . PHP_EOL);
        }
dd(1);
        $imageAnnotator->close();
        $time_elapsed_secs = microtime(true) - $start;

        return view('ocr', ['path' => $path, 'text' => $response->json()['ParsedResults'][0]['ParsedText'], 'time' => round($time_elapsed_secs, 2)]);
    }
}
