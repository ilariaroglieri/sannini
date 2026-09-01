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
  [
    'pattern'  => 'prodotti/more',
    'language' => '*',
    'action' => function ($language) {
      try {
        $page = page('prodotti'); // page exhibitions

        $offset = (int) get('offset', 0);
        $limit  = 3;

        $products = $page->children();
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
];

?>

