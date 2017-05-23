<?php

  kirby()->set('route', array(
        'pattern' => 'api/menu',
        'action'  => function() {
            return response::json(site()->pages()->visible()->toJson());
        }
  ));

  kirby()->set('route', array(
        'pattern' => 'api/home',
        'action'  => function() {
            if ( site()->homePage() ) {
              return response::json(site()->homePage()->toJson());
            } else {
              return response::error($message = '404 Not found', $code = 404, $data = array($section));
            }
        }
  ));

  kirby()->set('route', array(
        'pattern' => 'api/(:any)',
        'action'  => function($page) {
            if ( site()->pages()->find($page) ) {
              return response::json(site()->page($page)->toJson());
            } else {
              return response::error($message = '404 Not found', $code = 404, $data = array($page));
            }
        }
  ));

  kirby()->set('route', array(
        'pattern' => 'api/(:any)/children',
        'action'  => function($page) {
            if ( site()->pages($page) && site()->pages($page)->children()->visible() ) {
              return response::json(site()->page($page)->children()->visible()->toJson());
            } else {
              return response::error($message = '404 Not found', $code = 404, $data = array($page));
            }
        }
  ));

  kirby()->set('route', array(
        'pattern' => 'api/(:any)/(:any)',
        'action'  => function($section, $page) {
            if ( site()->page($section)->children()->find($page) ) {
              return response::json(site()->page($section)->children()->find($page)->toJson());
            } else {
              return response::error($message = '404 Not found', $code = 404, $data = array($section, $page));
            }
        }
  ));
