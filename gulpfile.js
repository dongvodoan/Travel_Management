var gulp = require('gulp');
var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    // Combine scripts
  mix.scripts([ 
      'summernote/dist/summernote.min.js'
    ],
    'public/backend/js/vendor.js',
    'vendor/bower_dl'
  );

  // Compile css
  mix.styles([
  	  'summernote/dist/summernote.css'
  ], 
    'public/backend/css/vendor.css',
    'vendor/bower_dl'
  );
});
