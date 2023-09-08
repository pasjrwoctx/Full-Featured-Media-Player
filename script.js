/* Full Featured Media Player */

(function($) {

    'use strict';
  
    // The player object.
    var player = {};
  
    // Initialize the player.
    player.init = function() {
      // Get the playlist.
      var playlist = $('.full-featured-media-player .playlist');
  
      // Get the player controls.
      var controls = $('.full-featured-media-player .player .controls');
  
      // Get the waveform.
      var waveform = $('.full-featured-media-player .player .controls .waveform');
  
      // Bind the play/pause button click event.
      controls.find('.play').on('click', player.play);
  
      // Bind the stop button click event.
      controls.find('.stop').on('click', player.stop);
  
      // Bind the progress bar change event.
      controls.find('.progress').on('change', player.seek);
    };
  
    // Play the current song.
    player.play = function() {
      // Get the current song.
      var song = playlist.find('.active a');
  
      // Play the song.
      song.get(0).play();
    };
  
    // Stop the current song.
    player.stop = function() {
      // Get the current song.
      var song = playlist.find('.active a');
  
      // Stop the song.
      song.get(0).pause();
    };
  
    // Seek to the specified position in the current song.
    player.seek = function(event) {
      // Get the current song.
      var song = playlist.find('.active a');
  
      // Seek to the specified position.
      song.get(0).currentTime = event.target.value;
    };
  
    // Initialize the player when the DOM is ready.
    $(document).ready(player.init);
  
  })(jQuery);
  