<?php

use Kirby\Sane\Html;

return [
  'debug'  => true,
  'languages' => true,
  'fancypants' => true,
  'panel' => [
    'language' => 'en',  // default inglese
    'css' => 'assets/css/custom-panel.css'
  ],
  // load more products
  'routes' => [
    [
      'pattern'  => 'prodotti/more',
      'language' => '*',
      'action' => function ($language) {
        try {
          $page = page('prodotti'); // prodotti

          $offset = (int) get('offset', 0);
          $limit = (int) get('limit', 12);

          $products = $page->children()->listed();
          $batch = $products->slice($offset, $limit);

          $hasMore = ($offset + $limit) < $products->count();

          $html = '';
          
          foreach ($batch as $item) {
            $html .= snippet('product-card', ['item' => $item], true);
          }

          return \Kirby\Http\Response::json([
            'html'    => $html,
            'hasMore' => $hasMore,
          ]);

        } catch (\Throwable $e) {
          return \Kirby\Http\Response::json([
            'error' => $e->getMessage(),
          ]);
        }
      }
    ],
    [
      'pattern'  => 'realizzazioni/more',
      'language' => '*',
      'action' => function ($language) {
        try {
          $page = page('realizzazioni'); // prodotti

          $offset = (int) get('offset', 0);
          $limit = (int) get('limit', 12);

          $products = $page->children()->listed();
          $batch = $products->slice($offset, $limit);

          $hasMore = ($offset + $limit) < $products->count();

          $html = '';
          
          foreach ($batch as $item) {
            $slug = $item->slug();
            $html .= '<div id="' . $slug . '" class="realization">';
            $html .= snippet('title-module-realization', [
              'url'     => $item->url(),
              'title'   => $item->title()->fancypants(),
              'caption' => $item->realization_caption()->fancypants(),
              'img'     => $item->cover_img()->toFile(),
              'isArchive' => true,
            ], true);
            $html .= '</div>';
          }

          return \Kirby\Http\Response::json([
            'html'    => $html,
            'hasMore' => $hasMore,
          ]);

        } catch (\Throwable $e) {
          return \Kirby\Http\Response::json([
            'error' => $e->getMessage(),
          ]);
        }
      }
    ],
  ]
];

?>

