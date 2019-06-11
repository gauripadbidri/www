$(function(){

    DomToggle.ShowPreLoader();
    // Hide ALL Sticky Headers for Each Step initially.
    DomToggle.ShowHideCarousalForStep(-1);

    // Initially All Products Sections should be invisible - Only Clicking Btn will show this section.
    $("#shopify-section-product-subscription-collection-template").css('display', 'none');

    // Variable Declarations
    var userSelectedSlide = 0;
    var currentSlideSelected = userSelectedSlide;
    var hygeineType = 0;
    var userOptions = {
        currentSlideSelected : userSelectedSlide,
        hygeineType : 0,
        addons:[],
    };
    var addonProduct = {
        name:'',
        id:'',
        quantity: '',
        addType: '' // Subscription or One Time
    };

    var isCookiePresent = Cookie.checkCookie();
    if(true === isCookiePresent){
        // get user selection for ALL Steps
        userOptions = Cookie.getCookie();
        userSelectedSlide = userOptions["currentSlideSelected"];
        hygeineType = userOptions["hygeineType"];
        if(hygeineType !== 0){
          // Mark user selected hygeine option
          $("input[name=step-one-hygeine]").val([hygeineType]);
        } 
    } else {
        $("input[name=step-one-hygeine]").val([0]);
        Cookie.setCookie(userOptions);
    }

    DomToggle.TogglePreviousNextButtons(userSelectedSlide, hygeineType);

    var $carousel = FlickityCarousal.initCarousal();
     // Go to user selected Slide - without animation
     FlickityCarousal.selectSlide(userSelectedSlide, true);
     // Show respective STEP header as well
     DomToggle.ShowHideCarousalForStep(userSelectedSlide);



     /****************************************** */

     $(".previous").on('click', function(eventTarget) {
        if(eventTarget && eventTarget.originalEvent && eventTarget.originalEvent.detail > 1){ 
          console.log("Return false")
          return false; }
       
        // Hide the Filters - They show up on Step 1 in some scenarios.
        $('.CollectionFilters').css('display', 'none');
        userOptions = Cookie.getCookie();

        if(!userOptions){
          window.location.reload()
        }
        eventTarget.stopImmediatePropagation();  
        eventTarget.stopPropagation();
        eventTarget.preventDefault();

        userSelectedSlide = userOptions["currentSlideSelected"];
        var hygeineType = userOptions["hygeineType"];
        userSelectedSlide = userSelectedSlide - 1;
        if(userSelectedSlide < 0){
           userSelectedSlide = 0; 
        }

        // let hygeineTypeCheck = $("[name='step-one-hygeine']").val();
        // if(hygeineType &&  hygeineTypeCheck!= hygeineType){
        //    $("[name='step-one-hygeine']").val([hygeineType]);
        // }

        userOptions["currentSlideSelected"] = userSelectedSlide;
        DomToggle.TogglePreviousNextButtons(userSelectedSlide, hygeineType);
        DomToggle.ShowHideCarousalForStep(userSelectedSlide);
        Cookie.setCookie(userOptions);
        DomToggle.AnimateScrollTop();
        FlickityCarousal.navigateToPreviousSlide(userSelectedSlide);

      });

      // $(".next").on('dblclick',function(e){
      //     /*  Prevents default behaviour  */
      //       e.preventDefault();
      //       /*  Prevents event bubbling  */
      //       e.stopPropagation();
      //       return;
      // });

      $(".next").on('click ', function(eventTarget) {

          userOptions = Cookie.getCookie();

          if(!userOptions){
            window.location.reload()
          }
        
        if(eventTarget && eventTarget.originalEvent && eventTarget.originalEvent.detail > 1){ 
          console.log("Return false")
          return false; }

        eventTarget.stopImmediatePropagation();  
        eventTarget.stopPropagation();
        eventTarget.preventDefault();
  

        userSelectedSlide = userOptions["currentSlideSelected"];
        var hygeineType = userOptions['hygeineType'];
        if(userSelectedSlide == 1 && hygeineType == 0) {

          // Do NOT proceed till user selects an option
          return false;
        }

        userSelectedSlide = userSelectedSlide + 1;
        userOptions["currentSlideSelected"] = userSelectedSlide;

        if(userSelectedSlide === 2 && hygeineType==0){
           userSelectedSlide = 1;
        }

        // let hygeineTypeCheck = $("[name='step-one-hygeine']").val();
        // if(hygeineType &&  hygeineTypeCheck!= hygeineType){
        //    $("[name='step-one-hygeine']").val([hygeineType]);
        // }

        if(userSelectedSlide > 3){
           userSelectedSlide = 3; 
         }

        if(userSelectedSlide == 3) {
            Cart.loadCartData();
          } 

          DomToggle.TogglePreviousNextButtons(userSelectedSlide, hygeineType);
          DomToggle.hideCollectionFilter(true);
          DomToggle.ShowHideCarousalForStep(userSelectedSlide);          
          Cookie.setCookie(userOptions);       
          DomToggle.AnimateScrollTop();                
          FlickityCarousal.navigateToNextSlide(userSelectedSlide);
      });    

      // Step 3 - Add More Click should take user to STep 2
      $('.addmore-products-custom-button').on('click', function(e){
        userOptions = Cookie.getCookie();
        var hygeineType = userOptions['hygeineType'];
        userOptions["currentSlideSelected"] = 2;        
        DomToggle.TogglePreviousNextButtons(2, hygeineType);
        DomToggle.ShowHideCarousalForStep(2);
        Cookie.setCookie(userOptions);
        FlickityCarousal.navigateToPreviousSlide(2);
      });

     $('input[name=step-one-hygeine]').on('change', function() {
          $(".carousalStepNext").css('display', 'block');
          userOptions = Cookie.getCookie();

          userOptions['hygeineType'] = $(this).val();

          userSelectedSlide = userOptions["currentSlideSelected"];
          currentSlideSelected = userSelectedSlide + 1;
          userOptions["currentSlideSelected"] = userSelectedSlide;
          
          DomToggle.hideCollectionFilter(true);

          Cookie.setCookie(userOptions);
          DomToggle.showLoading();

          Cart.updateFrequency(true);
      });

      $('#btn_email_to_shopifyregister_and_newsletter').click(function(eventTarget) {
        if(eventTarget && eventTarget.originalEvent && eventTarget.originalEvent.detail > 1){ 
          return false; 
        }
          userOptions = Cookie.getCookie();

          if(!userOptions){

            Cookie.setCookie({
                currentSlideSelected : userSelectedSlide,
                hygeineType : 0,
                addons:[],
            })
            userOptions = Cookie.getCookie();
          }

          userSelectedSlide = userOptions["currentSlideSelected"];
          var hygeineType =  userOptions['hygeineType'];
          currentSlideSelected = userSelectedSlide + 1;

          if(currentSlideSelected === 2 && hygeineType==0){
              currentSlideSelected = 1;
          }

          // let hygeineTypeCheck = $("[name='step-one-hygeine']").val();
          // if(hygeineType &&  hygeineTypeCheck != hygeineType){
          //    $("[name='step-one-hygeine']").val([hygeineType]);
          // }
  
          if(currentSlideSelected > 3){
             currentSlideSelected = 3;
          }

          DomToggle.TogglePreviousNextButtons(currentSlideSelected, hygeineType);
          FlickityCarousal.navigateToNextSlide(currentSlideSelected);

          userOptions["currentSlideSelected"] = currentSlideSelected;
          DomToggle.ShowHideCarousalForStep(currentSlideSelected);
          Cookie.setCookie(userOptions);
          return false;
      });

      // if(typeof $.browser !== "undefined" && $.browser.msie == 1){
      //   $('#btn_email_to_shopifyregister_and_newsletter,#skipStep2,.previous,.next').dblclick(function (e) {
      //     console.log("stopped");
      //     Utils.stopEvent(e);
      //   });
      // }

      // Step 2 - Toggle AllProducts Section
      $("#cta-custom-button").on('click', function(){
        $("#shopify-section-product-subscription-collection-template").toggle();
        var $carousal= FlickityCarousal.getCarousalInstance();
        $carousal.flickity('reloadCells');
        DomToggle.hideCollectionFilter(false);
        return false;
      });

      $('#skipStep2').click(function (){
        userOptions = Cookie.getCookie();
        userSelectedSlide = userOptions["currentSlideSelected"];
        var hygeineType =  userOptions['hygeineType'];
        userSelectedSlide = userSelectedSlide + 1;

        userOptions["currentSlideSelected"] = userSelectedSlide;
        DomToggle.ShowHideCarousalForStep(userSelectedSlide);
        Cookie.setCookie(userOptions);
        FlickityCarousal.navigateToNextSlide(userSelectedSlide);
        if(userSelectedSlide == 3) {
            Cart.loadCartData();
          }
        DomToggle.TogglePreviousNextButtons(userSelectedSlide, hygeineType);
        return false;
      });

    // FILTER Container
    $('.CollectionToolbar__Item--filter').on('click', function(event){ 
       var cloneFilterElement = $('#collection-filter-drawer');
       // cloneFilterElement = $('#shopify-section-product-subscription-collection-template #collection-filter-drawer').clone(true);
       $(cloneFilterElement).attr('aria-hidden', 'false');
       $(cloneFilterElement).css('max-height',window.innerHeight + 'px');

    });
    
    // Hide Filter SideBar when clicked on Page Overlay Opace background
    $('.PageOverlay').on("click", function () {
        $('#collection-filter-drawer').attr('aria-hidden', 'true');
        $('.get-started-carousel').data('flickity').reloadCells();
    });

    // Tag CLICK Handler - To take TAG value and place in SECTION data-section-settings JSON Object.
    $('#collection-filter-drawer li button').on("click", function(e){
      e.preventDefault();
      var selectedTag = $(e.target).attr('data-tag');
      var jsonP = JSON.parse($('[data-section-id="product-subscription-collection-template"]').attr('data-section-settings'));
      var arr = [];
      arr.push(selectedTag);
      jsonP.currentTags =  arr;
      $('[data-section-id="product-subscription-collection-template"]').attr('data-section-settings',JSON.stringify(jsonP));
      var originalTagBtn = $('#shopify-section-product-subscription-collection-template #collection-filter-drawer').find('button[data-tag="'+selectedTag+'"]');
    });

    // Apply CSS Highlighted for a specific Tag.
    $('#collection-filter-drawer li').on('click', function(e){
      var tagBtn =  $(this).find('button');
      var tag = $(tagBtn).attr('data-tag');
      $('#collection-filter-drawer li').removeClass('is-selected');
      $('#collection-filter-drawer li button').removeClass('is-active');
     
      $('#shopify-section-product-subscription-collection-template #collection-filter-drawer li').each(function( index ) {
        var tempBtn = $(this).find('button');
        if($(tempBtn).attr('data-tag') === tag){
          // Add CSS Classes to it.
          $(this).addClass('is-selected');
          $(tempBtn).addClass('is-active');
        }
      });

      $(this).addClass('is-selected');
      $(this).find('button').addClass('is-active');
    });

    $(document).on("click", '[data-drawer-id="collection-filter-drawer"]:first', function(e){
      $('#collection-filter-drawer').attr('aria-hidden', 'true');
      //ResetEachStep();
      return false;
    });

    $('[data-action="apply-tags"]:first').on('click', function(e){
      $('[data-action="apply-tags"]:last').click();
      $('[data-action="reset-tags"]').css('display', 'block'); // Show RESET after atleast 1 filter is applied.
      $('#collection-filter-drawer').attr('aria-hidden', 'true');
      //ResetEachStep();
      return false;
    });

    $('[data-action="reset-tags"]:first').on('click', function(e){
      $('[data-action="reset-tags"]:last').click();
      $('[data-action="reset-tags"]').css('display', 'none');
      $('#collection-filter-drawer').attr('aria-hidden', 'true');
     // ResetEachStep();
      return false;
    });

    // For MOBILE ONLY - Step 1 Info Display
    $('.info-icon').on('click', function(e) {
        var id = e.target.id;
        var descriptionDiv = id + '-description'
        if($('#' + descriptionDiv).is(":visible")) { 
          $('.info-icon-description').css('display','none');
        } else {
          $('.info-icon-description').css('display','none');
          $('#' + descriptionDiv ).css('display','block');
          $('#' + descriptionDiv ).css('text-align', 'center');
        }
        var $carousal= FlickityCarousal.getCarousalInstance();
        $carousal.flickity('reloadCells');
        return false;
    });    

    $('.customModal button').on('click', function(e){
        $(this).css('z-index', 0);
    });
    
    $(document).on('change', '.frequency_selector', function (e) {

      var cookieSelection = Cookie.getCookie();
      var selectedValue = $(e.currentTarget).val();
      var isOneOff = false;

      if(selectedValue =="Receive with this kit only" || selectedValue=="Receive in every kit"){
          var data = { }  
          var $selectedItem = $(e.currentTarget.options[e.currentTarget.options.selectedIndex]);

          if(selectedValue=="Receive in every kit"){
            data = {
              "quantity": $selectedItem.attr('data-quantity'),
              "properties[shipping_interval_unit_type]": subscriptionSettings.frequency,
              "properties[subscription_id]": subscriptionSettings.id,
              "properties[shipping_interval_frequency]": parseInt(cookieSelection.hygeineType, 10),
              "id": $selectedItem.attr('data-key'),
            };
          }else{
              isOneOff = true; 
              
              data = {
              "quantity":$selectedItem.attr('data-quantity'),
              "testId" : $selectedItem.attr('data-variantId'),   
              "properties[shipping_interval_unit_type]": null,
               "properties[subscription_id]": null,
              "properties[shipping_interval_frequency]": null,
              "id": $selectedItem.attr('data-key')
            };
          }
          DomToggle.showLoading();
          Cart.changeFrequency(data,isOneOff);
      }else {

        if (selectedValue == 0) {
          toastr.error("Please select valid frequency", "Error");
          return false;
        }
        cookieSelection.hygeineType = selectedValue;

        Cookie.setCookie(cookieSelection);
        DomToggle.showLoading();
        Cart.updateFrequency();
      }

    });


    $(document).on("click",'.CartItem__Remove', function(e){
       $(this).closest('div.editable-frequency').find('.frequency_selector').toggle();
       $(this).hide();
       return false;
     });
     
     // STEP 3 - Frequency Changer Dropdown
     $(document).on("change",'.frequency_selector', function(e){
       $(this).closest('div.editable-frequency').find('.CartItem__Remove').toggle();
       $(this).hide();
       return false;
     });

     // Add to EVERY Kit - Part of Every Subscription
     $(document.body).on('click', '.button-add-to-kit', function (eventTarget) {
      var isPopupTrue = false;
      if ($('#product-info-dialog').attr('aria-hidden') === "false") {
        document.querySelector('.Modal--show-product-info [data-action="close-modal"]').click()
        isPopupTrue = true;
      }
      var quantity = 1; //$(eventTarget.currentTarget.parentElement.parentElement).find('.QuantitySelector__CurrentQuantity').val()
      quantity = parseInt(quantity, 10);

      var buttonText = $(eventTarget.currentTarget).text();
      buttonText = buttonText.toLowerCase()// ? "ADDED TO EVERY KIT"

      if (buttonText == "add to every kit") {
        quantity = 1
      } else if (buttonText == "added to every kit") {
        quantity = 0;
      }

      var $imageElement = $(eventTarget.currentTarget.parentElement.parentElement.parentElement);

      if (eventTarget.currentTarget.getAttribute('data-product')) {
        Cart.addItemToCart(eventTarget.currentTarget.getAttribute('data-product'), 
        false, false, quantity, eventTarget.currentTarget,isPopupTrue,$imageElement)
      }
      return false;

    });

    $(document.body).on('click', '.add-only-kit', function (eventTarget) {
      var isPopupTrue = false;
     

      if ($('#product-info-dialog').attr('aria-hidden') === "false") {
        document.querySelector('.Modal--show-product-info [data-action="close-modal"]').click();
        isPopupTrue = true;
      }

      var quantity = 1 // $(eventTarget.currentTarget.parentElement.parentElement).find('.QuantitySelector__CurrentQuantity').val()
      quantity = parseInt(quantity, 10);

      var buttonText = $(eventTarget.currentTarget).text();
      buttonText = buttonText.toLowerCase();// ? "ADDED TO EVERY KIT" 
      
      if (buttonText == "add to this kit only") {
        quantity = 1
      } else if (buttonText == "added to this kit only") {
        quantity = 0;
      }

      var $imageElement = $(eventTarget.currentTarget.parentElement.parentElement.parentElement);

      if (eventTarget.currentTarget.getAttribute('data-product')) {
        Cart.addItemToCart(eventTarget.currentTarget.getAttribute('data-product'),
         true, false, quantity,
        eventTarget.currentTarget,isPopupTrue,$imageElement)
      }

      //product-kit-color
      eventTarget.preventDefault();
      return false;
    });

    $(document.body).on('click', '.quantity-selector', function (eventTarget) {

      if (window.selected_product_kit.product && window.selected_product_kit.product.variants.length > 0) {
        var variant_id = window.selected_product_kit.product.variants[0].id;
        var dataLineId = eventTarget.currentTarget.getAttribute('data-line-id').split(':');

        if (dataLineId.length > 0 && dataLineId[0] == variant_id) {
          var quantity = eventTarget.currentTarget.getAttribute('data-quantity')
          if (quantity == 0) {
            toastr.error("At least one kit item should be present in the cart", "Error");
            return false;
          }
        }
      }
      DomToggle.showLoading();
      Cart.changeQuantity(eventTarget);
      return false;
    });

    Cart.addColorToSelectedProduct();
    Cart.loadCartData();

});