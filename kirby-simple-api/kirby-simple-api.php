<?php

  function imagesForPage($page) {

    // hold the image objs we make
    $imageObjs = [];
    // get the images
    $images = $page->images()->sortBy('sort');

    // add the images
    foreach ($images as $key => $image) {
      // change each image into json
      $jsonImage = $image->toJson();
      // decode the json to a php object
      $imageObj = json_decode($jsonImage);
      // add the image object to the images array
      $imageObjs['originals'][] = $imageObj;
      // make a thumb form the image
      $thumbImage = thumb($image, array('width' => 600, 'crop' => true));
      // turn the thumb into json and back to a php object
      $thumbObj = json_decode($thumbImage->toJson());
      // add the thumb to the images array
      $imageObjs['thumbnails'][] = $thumbObj;
    }

    return $imageObjs;
  }

  function childrenForPage($page) {
    // hold the child object we make
    $childrenObjs = [];

    // get the child pages
    $children = $page->children();

    foreach ($children as $key => $child) {
      // change each image into json
      $jsonChild = $child->toJson();
      // decode the json to a php object
      $childObj = json_decode($jsonChild);

      // add any images
      $childObj->images = imagesForPage($child);

      // add the image object to the images array
      $childrenObjs[] = $childObj;
    }
    return $childrenObjs;

  }
  kirby()->set('route', array(
        'pattern' => 'api/(:all)',
        'action'  => function($path) {
            if (site()->pages()->find($path)) {
              // get the page
              $page = site()->pages()->find($path);
              // decode the json to php obj
              $pageObj = json_decode($page->toJson());

              // add images if there are any
              $pageObj->images = imagesForPage($page);

              // add children if any
              $pageObj->children = childrenForPage($page);

              // encode back to json
              $result = json_encode($pageObj);
              return response::json($result);
            } else {
              return response::error($message = '404 Not found', $code = 404, $data = array($section));
            }
        }

  ));
