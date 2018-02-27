      /*
        // Note from Cat //
        I'm adding this to make a function for the pop ups.
        what happens is I will use the id as a key and then make a json item with the
        paramaters (image url, title text if it exists and height and width so it can be changed easily)

      */

      var popUpData = {
        "o-chall-bn-1": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-1-o": {
          "height": 650,
          "width": 1000,
          "left": 180,
          "top": 200,
          "background-img": "img/onc-spread1-1.png"
        },
        "pop-bn-2-o": {
          "height": 650,
          "width": 1000,
          "left": 170,
          "top": 200,
          "background-img": "img/onc-spread1-2.png"
        },
        "pop-bn-3-o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread1-3.png"
        },
        "o-chall-bn-2": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-2-1o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-1.png"
        },
        "pop-bn-2-2o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-2.png"
        },
        "pop-bn-2-3o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-3.png"
        },
        "pop-bn-2-4o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-4.png"
        },
        "pop-bn-2-5ao": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-5a-5b.png"
        },
        "pop-bn-2-5bo": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-5a-5b.png"
        },
        "pop-bn-2-6o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread2-6.png"
        },
        "o-chall-bn-3": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-3-1o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread3-1.png"
        },
        "pop-bn-3-2ao": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread3-2a-2b.png"
        },
        "pop-bn-3-2bo": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread3-2a-2b.png"
        },
        "o-chall-bn-4": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-4.png"
        },
        "pop-bn-4-1o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-1.png"
        },
        "pop-bn-4-2o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-2.png"
        },
        "pop-bn-4-3o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-3.png"
        },
        "pop-bn-4-4o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-4.png"
        },
        "pop-bn-4-5ao": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-5a-5b.png"
        },
        "pop-bn-4-5bo": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread4-5a-5b.png"
        },
        "pop-bn-5-1ao": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread5-1a-1b.png"
        },
        "pop-bn-5-1bo": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread5-1a-1b.png"
        },
        "pop-bn-5-2o": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-spread5-2.png"
        },
        "u-chall-bn-1": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-1-1u": {
          "height": 650,
          "width": 1000,
          "left": 180,
          "top": 200,
          "background-img": "img/uro-spread1-1.png"
        },
        "pop-bn-1-2u": {
          "height": 650,
          "width": 1000,
          "left": 170,
          "top": 200,
          "background-img": "img/uro-spread1-2.png"
        },
        "pop-bn-1-3u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread1-3.png"
        },
        "pop-bn-1-4u": {
          "height": 650,
          "width": 1000,
          "left": 170,
          "top": 200,
          "background-img": "img/uro-spread1-4.png"
        },
        "pop-bn-1-5u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread1-5.png"
        },
        "u-chall-bn-2": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-2-1u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-1.png"
        },
        "pop-bn-2-2u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-2.png"
        },
        "pop-bn-2-3u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-3.png"
        },
        "pop-bn-2-4u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-4.png"
        },
        "pop-bn-2-5au": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-5a-5b.png"
        },
        "pop-bn-2-5bu": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-5a-5b.png"
        },
        "pop-bn-2-6u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread2-6.png"
        },
        "u-chall-bn-3": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-1.png"
        },
        "pop-bn-3-1u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread3-1.png"
        },
        "pop-bn-3-2u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread3-2.png"
        },
        "pop-bn-3-3au": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread3-3a-3b.png"
        },
        "pop-bn-3-3bu": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread3-3a-3b.png"
        },
        "u-chall-bn-4": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-4.png"
        },
        "pop-bn-4-1u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-1.png"
        },
        "pop-bn-4-2u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-2.png"
        },
        "pop-bn-4-3u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-3.png"
        },

        "pop-bn-4-4u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-4.png"
        },

        "pop-bn-5-3au": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-5a-5b.png"
        },
        "pop-bn-4-5bu": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-5a-5b.png"
        },
        "pop-bn-4-6u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread4-6.png"
        },
        "u-chall-bn-5": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/onc-challenge-bt-4.png"
        },
        "pop-bn-5-1u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-1.png"
        },
        "pop-bn-5-2u": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-2.png"
        },
        "pop-bn-5-3au": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-3a-3b.png"
        },
        "pop-bn-5-3bu": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-3a-3b.png"
        },
        "ob-chall-bn-1": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-1.png"
        },
        "ob-chall-bn-2": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-2.png"
        },
        "ob-chall-bn-3": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-3a-3b.png"
        },
        "ob-chall-bn-4": {
          "height": 650,
          "width": 1000,
          "left": 200,
          "top": 200,
          "background-img": "img/uro-spread5-3a-3b.png"
        }
      };


      function showPopUp(buttonId) {
        var showData = popUpData[buttonId];
        var modalStyles = {
          height: showData['height'] + "px",
          width: showData['width'] + "px",
          // top: showData['top'] + "px",
          top: '0px',
          // left: showData['left'] + "px",
          left: '0px',
          bottom: '0px',
          right: '0px',
          margin: 'auto'
          // transform: 'translateX(-50%) translateY(-50%)'
          // clip: "rect(75px," + showData['width'] + "px," + (showData['height']-10) + "px,0px)"
        };

        var closeStyles = {
          // width: showData['width'] + "px",
          // top: (showData['top'] - 10) + "px",
          // left: (showData['left'] - 20) + "px"
        };

        var bgImg = {
            background: "url(" + showData['background-img'] + ")",
        };

        $('.popup-modal').css(modalStyles);
        $('.modal-pic').html('<img src="' + showData['background-img'] + '">');
        $('.popup-modal-close').css(closeStyles);
        $('.reveal').addClass('on-blur');

        $('#popup-container').fadeIn("fast", function() {
          $('.popup-modal, .popup-modal-close').fadeIn("fast", function() {});
        });

      }

      function hidePopUp() {
        $('.popup-modal, .popup-modal-close').fadeOut("fast", function() {
          $('#popup-container').fadeOut("fast", function() {
            $('.reveal').removeClass('on-blur');
          });
        });
      }



      /** Cat Note End**/


      $(document).ready(function() {

            /* fade out modal and then close on click on close button or blur(bg) */
            $('.popup-modal-close, .blur').on('click', function(e) {
              hidePopUp();
            });

            /* onclick button show popup */
            $(".open-popup-btn").on('click', function() {
              var buttonId = $(this).attr('id');
              console.log('button id: ' + buttonId);
              showPopUp(buttonId);
            });



            $(".next").on('click', function() {
              var state = Reveal.getState().indexh;
              Reveal.slide(state + 1);
              console.log(state + 1);
            });

            $(".prev").on('click', function() {
              var state = Reveal.getState().indexh;
              Reveal.slide(state - 1);
              console.log(state - 1);
            });

            $(".home").on('click', function() {
              Reveal.slide(0);
            });

            var timedReset = null;
            var timeToReset = 600000; //milliseconds
            $("body").on('click', function(){
             timedReset = setTimeout(function(){
               Reveal.slide(0);
               if ($('.popup-modal').is(':visible')){
                 hidePopUp()
               }
             }, timeToReset);

            });
            console.log(timeToReset)

            Reveal.addEventListener( 'slidechanged', function( event ) {
              // console.log($(event.currentSlide).hasClass('addFrag'));
              Reveal.navigateFragment( 0 );
              var hasFrag = $(event.currentSlide).hasClass('addFrag');
              if (hasFrag) {
                Reveal.nextFragment();
              }
              //  REveal.nexF
              //}
              // var fragadd = Reveal.nextFragment();
              // var addfrag = class="addfrag"
              // event.fragment = the fragment DOM element
            } );

          });



            // $(".Qasize").on('click', function(){
            //   var quiz_id = $(this).attr('data-quiz');
            //   $('.quiz_'+quiz_id).each(function(){
            //     if (!$(this).hasClass('correct')){
            //       $(this).css('font-weight', '100').css('color', '#70706f');
            //     }
            //   });
            //       setTimeout(function(){  resetcolor(); Reveal.next();},1000);
            //
            //         function resetcolor(){setTimeout(function(){$('.quiz_'+quiz_id).css('color', 'black').css('font-weight', '900');},2000)}
            // });








            /*Reveal.addEventListener( 'slidechanged', function( event ) {
              var  = $(event.currentSlide).hasClass('firstFrag');
              if (hasFirstFrag) {
                console.log(hasFirstFrag);
                Reveal.nextFragment();
              }
              else{
              }
            });*/
