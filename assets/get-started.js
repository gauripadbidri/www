var Cookie = {
    name: "testgmcscookie",
    getCookie: function () {
        var name = this.name + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return JSON.parse(c.substring(name.length, c.length));
          }
        }
        return "";
    },
    setCookie: function (cvalue) {
        var cookieContent = this.name + "=" + JSON.stringify(cvalue) ; 
        document.cookie = cookieContent;    
    },
    checkCookie: function () {
        var cookie = this.getCookie();
        if (cookie == "") {
            return false;
        } else {
            return true;
        }
    },
    deleteCookie: function() {
      var d = new Date(); //Create an date object
      d.setTime(d.getTime() - (1000*60*60*24)); //Set the time to the past. 1000 milliseonds = 1 second
      var expires = "expires=" + d.toGMTString(); //Compose the expirartion date
      window.document.cookie = this.name + "="+"; "+ expires;
    }
};

var DomToggle = {
    ResetEachStep: function (){
        setTimeout(function(){
          $('.get-started-carousel').data('flickity').reloadCells(); 
        }, 6000);
    },
    hideCollectionFilter: function(visible){
      if(visible){
        $('.CollectionFilters').hide();
      }else{
        $('.CollectionFilters').show();
      }
    },
    ShowHideCarousalForStep: function (userSelectedSlide){
    if(userSelectedSlide === 1){
      $('#shopify-section-back-carousal-step-one').css('display', 'block');
      $('.stepTransitionBottom1').css('display', 'block');
      $('#shopify-section-back-carousal-step-two').css('display', 'none');
      $('#shopify-section-back-carousal-step-three').css('display', 'none');
    } else if(userSelectedSlide === 2) {
      this.hideCollectionFilter(false);
      $('#shopify-section-back-carousal-step-one').css('display', 'none');
      $('.stepTransitionBottom1').css('display', 'none');
      $('.stepTransitionBottom2').css('display', 'block');
      $('#shopify-section-back-carousal-step-two').css('display', 'block');
      $('#shopify-section-back-carousal-step-three').css('display', 'none');
    } else if(userSelectedSlide === 3) {
      $('#shopify-section-back-carousal-step-one').css('display', 'none');
      $('.stepTransitionBottom1').css('display', 'none');
      $('#shopify-section-back-carousal-step-two').css('display', 'none');
      $('.stepTransitionBottom2').css('display', 'none');
      $('#shopify-section-back-carousal-step-three').css('display', 'block');
    } else {
      $('#shopify-section-back-carousal-step-one').css('display', 'none');
      $('#shopify-section-back-carousal-step-two').css('display', 'none');
      $('#shopify-section-back-carousal-step-three').css('display', 'none');
      $('.stepTransitionBottom1').css('display', 'none');
      $('.stepTransitionBottom2').css('display', 'none');
    }
  },
  showLoading: function(){
    document.dispatchEvent(new CustomEvent('theme:loading:start'));
  },
  hideLoading: function(){
    document.dispatchEvent(new CustomEvent('theme:loading:end'));
  },
  TogglePreviousNextButtons: function (userSelectedSlide,hygeineType) {
    if(userSelectedSlide < 1 || userSelectedSlide > 3 ) {
        $(".carousalStepBack").css ('display', 'none');
        $(".carousalStepNext").css ('display', 'none');          
    } else {
        $(".carousalStepBack").css ('display', 'block');
        if(userSelectedSlide == 3 || hygeineType == 0) {
          $(".carousalStepNext").css ('display', 'none');      
        } else {
          $(".carousalStepNext").css ('display', 'block');  
        }
    }
  },
  AnimateScrollTop: function (){
    $([document.documentElement, document.body]).animate({
        scrollTop: 0
    }, 1800);
  },
  ShowPreLoader: function(){    
    $(".se-pre-con").fadeOut("slow");
  }
};

var Utils = {
    getUrlParameter:function (url){
      var vars = [], hash;
      var hashes = url.slice(url.indexOf('?') + 1).split('&');
      for(var i = 0; i < hashes.length; i++)
      {
          hash = hashes[i].split('=');
          vars.push(hash[0]);
          vars[hash[0]] = hash[1];
      }
      return vars;
  },
  stopEvent:function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    e.stopPropagation();
    return false;
  }
};

var Cart = {
  addItemToCart: function (product, isOneOff, isKit, quantity, 
    buttonElement,isPopupTrue,$imageElement) {
    var cookieSelection = Cookie.getCookie();
    document.dispatchEvent(new CustomEvent('theme:loading:start'));
    product = JSON.parse(product);
    var message = "";   
    if (isOneOff) {
      data = {
        "quantity": quantity,
        "id": product.id,
      }
    } else {

      data = {
        "quantity": quantity,//product.quantity,
        "id": product.id,
        "properties[shipping_interval_unit_type]": subscriptionSettings.frequency,
        "properties[subscription_id]": subscriptionSettings.id,
        "properties[shipping_interval_frequency]": parseInt(cookieSelection.hygeineType, 10),
      }

      if (isKit) {
        data["properties[isKit]"] = true;
      }
    }
    message = "ADDED TO EVERY KIT";
    var text = ""
    var url = "/cart/add.js";

    if (isOneOff) {

      if (quantity == 0) {
        text = "ADD TO THIS KIT ONLY";
        url = "/cart/change";
      } else {
        text = "ADDED TO THIS KIT ONLY";
      }
    } else {
      if (quantity == 0) {
        url = "/cart/change";
        text = "ADD TO EVERY KIT";
      } else {
        text = "ADDED TO EVERY KIT";
      }
    }
    
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      dataType: 'json',
      success: function (cartItems) {

        var addedProduct = null;
        if(url=='/cart/add.js'){
            addedProduct =  cartItems;
        }else{
          addedProduct = Cart.searchCartitem(cartItems.items,product.id);
        }
        
        if (isOneOff) {
          message = "ADDED TO THIS KIT ONLY";
        }

        if (isKit) {
          message = "";
        }
        
        if(quantity == 0){
          message = "REMOVED PRODUCT FROM CART";
           addedProduct =  { 
            "title" : $(buttonElement).attr('data-product-title'),
             "image": $(buttonElement).attr('data-img-url')
          }
        }
        if(addedProduct){
          var messageHtml = $('#cart-toaster-container').clone(); 
          $(messageHtml).css('display','table')  
          $(messageHtml).find('.message-change').text(message);
          $(messageHtml).find('.product-name-change').text(addedProduct.title);
          $(messageHtml).find('.product-img-change').attr('src',addedProduct.image);
       }else{
         messageHtml = message;
       } 

        if(!isKit){ 
          toastr.success("", messageHtml);
        }
        DomToggle.hideLoading();

        if(quantity==0 && text=="ADD TO EVERY KIT" && $(buttonElement).hasClass('button-add-to-kit-disabled')){
          $(buttonElement).removeClass('button-add-to-kit-disabled');
        }else if(quantity > 0 && text=="ADDED TO EVERY KIT" && !$(buttonElement).hasClass('button-add-to-kit-disabled')){
           $(buttonElement).addClass('button-add-to-kit-disabled');
        }

        if(quantity==0 && text=="ADD TO THIS KIT ONLY" && $(buttonElement).hasClass('add-only-kit-disabled')){
          $(buttonElement).removeClass('add-only-kit-disabled');
        }else if(quantity > 0 && text=="ADDED TO THIS KIT ONLY" && !$(buttonElement).hasClass('add-only-kit-disabled')){
           $(buttonElement).addClass('add-only-kit-disabled');
        }

        $(buttonElement).text(text);

        if(isPopupTrue){
          Cart.addColorToSelectedProduct(isPopupTrue);
        }

        if($imageElement){
            var datatags = [];
            var dataAttr = $imageElement.find('.product-kit-color').attr('data-tags');

            if (dataAttr) {
              datatags = JSON.parse(dataAttr);
            }

            if (datatags.length > 0) {
              var datatag = Cart.findSimilar(datatags, subscriptionSettings.glogalDatatags);
              datatag = datatag[0];

              if(quantity > 0){
                $imageElement.find('.product-kit-color').addClass(datatag)
              }else if(quantity == 0 && 
                $imageElement.find('.add-only-kit-disabled').length ==0
                && $imageElement.find('.button-add-to-kit-disabled').length ==0){
                $imageElement.find('.product-kit-color').removeClass(datatag)
              }
            }
        }
      },
      error: function (err) {
        DomToggle.hideLoading();
        toastr.error("Something went wrong. Please try again.", "Error");
      }
    });
  },
  loadCartData: function () {
    $.get('/cart?view=data', function (data) {
      DomToggle.hideLoading();
      $('#cartSection').html(data);
      $('.total-title-medium').text($('.price-info-align').text());

      // TODO :: Change the code..
      $('.get-started-carousel').data('flickity').reloadCells(); 
      
      if(BrowserDetection.isIOS()){
        $('.get-started-carousel').data('flickity').resize();
      }

    });
  },
  updateFrequency: function (hygeineType) {

    var selectedValue = "";
    var cookieSelection = Cookie.getCookie();
    selectedValue = cookieSelection.hygeineType;

    $.getJSON('/cart.js', function (cartItem) {

      var deferreds = [];
      var qunatity = 0
      var key = "";
      var product = {};

      if (window.selected_product_kit.product.variants.length > 0) {
        product.name = window.selected_product_kit.product.title;
        product.id = window.selected_product_kit.product.variants[0].id;
      }

      var checkIsKitPresent = false;

      for (var index = 0; index < cartItem.items.length; index++) {

        if (cartItem.items[index].variant_id == product.id) {
          checkIsKitPresent = true;
        }

        if (cartItem.items[index].properties && cartItem.items[index].properties.subscription_id) {

          var data = {
            "quantity": cartItem.items[index].quantity,
            "properties[shipping_interval_unit_type]": subscriptionSettings.frequency,
            "properties[subscription_id]": subscriptionSettings.id,
            "properties[shipping_interval_frequency]": parseInt(selectedValue, 10),
            "id": cartItem.items[index].key,
          };

          if (cartItem.items[index].properties.isKit) {
            data["properties[isKit]"] = true;
          }

          console.log(data);
          deferreds.push($.ajax({
            type: 'POST',
            url: "/cart/change.js",
            data: data,
            dataType: 'json',
            cache: false,
            async: false,
          }));
        }
      }

      if (checkIsKitPresent === false) {
        Cart.addItemToCart(JSON.stringify(product), false, true, 1);
      }

      if (deferreds.length > 0) {

        $.when.apply($, deferreds).
          then(function (succes) {
            DomToggle.hideLoading();
            Cart.loadCartData();
          }).fail(function (err) {
            DomToggle.hideLoading();
            if (hygeineType) {
              DomToggle.hideCollectionFilter(false);
            }
            loadCartData();
          }).fail(function (err) {
            DomToggle.hideLoading();
            toastr.error("Something went wrong. Please try again.", "Error");
          });
      } else {

        DomToggle.hideLoading();
      }
    });

  },
  changeQuantity:function(eventTarget) {
    var data = eventTarget.currentTarget.getAttribute('href');

    $.ajax({
      type: 'POST',
      url: data,
      success: function () {
        Cart.loadCartData();
        DomToggle.hideLoading();

        var parameters = Utils.getUrlParameter(data);
        var quantity =  parseInt(parameters["quantity"],10)

        if(quantity ===0){
          Cart.addColorToSelectedProduct(true); 
        }
      },
      error: function () {
        DomToggle.hideLoading();
        toastr.error("Something went wrong. Please try again !.", "Error");
      }
    })
  },
  changeFrequency : function(data,isOneOff){
      $.ajax({
        type: 'POST',
        url: "/cart/change.js",
        data: data,
        dataType: 'json',
        success: function () {
            Cart.loadCartData();
            DomToggle.hideLoading();
        },
        error: function () {
          DomToggle.hideLoading();
          toastr.error("Something went wrong. Please try again !.", "Error");
        }
      });
  },
  findSimilar:function(result1, result2) {

    var result = result1.filter(function (o1) {
      // filter out (!) items in result2
      return result2.some(function (o2) {
        return o1 == o2;          // assumes unique id
      });
    })
    return result
  },
  addColorToSelectedProduct: function (isPopup) {

    $.getJSON('/cart.js', function (cartItem) {

      if(isPopup && cartItem.items.length > 0){
        $('[data-item-product-text]').text('ADD TO EVERY KIT').removeClass('button-add-to-kit-disabled');
        $('[data-item-product-text-only-kit]').text('ADD TO THIS KIT ONLY').removeClass('add-only-kit-disabled');
        $('[data-item-product-id]').removeClass(subscriptionSettings.glogalDatatags.join(' '));
      }

      var isKitProductPresent = false;

      for (var index = 0; index < cartItem.items.length; index++) {
        var cartProduct = cartItem.items[index];


        var dataTagElement = $("[data-item-product-id='" + cartProduct.product_id + "']")

        var product_text_element =  null;
        var product_text = ""
        var product_class = "";

        if(window.selected_product_kit && window.selected_product_kit.product.variants[0].id==cartProduct.variant_id){
            isKitProductPresent = true;
        }

        if (cartProduct.properties && cartProduct.properties.subscription_id) {
           product_text = "ADDED TO EVERY KIT";   
           product_class = "button-add-to-kit-disabled";
           product_text_element = $("[data-item-product-text='" + cartProduct.product_id + "']")
        }else{
           product_text = "ADDED TO THIS KIT ONLY" 
           product_class = "add-only-kit-disabled";
           product_text_element = $("[data-item-product-text-only-kit='" + cartProduct.product_id + "']")
        }

        if(product_text){
            product_text_element.addClass(product_class); 
            product_text_element.text(product_text);
        }

        var dataTags = dataTagElement.attr('data-tags');
        if (dataTags) {
          dataTags = JSON.parse(dataTags);
          var datatag = Cart.findSimilar(dataTags, subscriptionSettings.glogalDatatags);
          datatag = datatag[0];

          if (dataTags.length > 0 && datatag != '') {
            dataTagElement.addClass(datatag)
          }
        }
      }
     
      var cookie =  Cookie.getCookie();

     // Meaning of this cart is empty and remove 
      if(window.selected_product_kit && isKitProductPresent===false 
        && cookie.currentSlideSelected > 1){
          var userOptions = {
              currentSlideSelected : 0,
              hygeineType : 0,
              addons:[],
          };
          Cookie.setCookie(userOptions);
          window.location.reload();
      }
    });
  },
  searchCartitem:function(cartItem,key){
      for (var index=0; index < cartItem.length; index++) {
          if (cartItem[index].variant_id === key) {
              return cartItem[index];
          }
      }
  }
};

var FlickityCarousal = {
  $carousel:'',
  initCarousal: function(){
      this.$carousel = $('.get-started-carousel').flickity({
                    'selectedAttraction': 0.01,
                    'friction': 0.15,
                    'prevNextButtons': false,
                    'pageDots': false,
                    'draggable': false,
                    'fade': true,
                    'adaptiveHeight': true,
                    'resize': true,
                    'accessibility': false,
                    'freeScrollFriction': 0.4,
                    'freeScroll': true  
                }); 

      return this.$carousel;
  },
  selectSlide: function(index, isAnimation){
     // Go to user selected Slide - without animation
    this.$carousel.flickity( 'select', index, false, isAnimation );
  },
  getCarousalInstance: function(){
    return this.$carousel;
  },
  navigateToNextSlide: function(userSelected){
    FlickityCarousal.selectSlide(userSelected,false);
  },
  navigateToPreviousSlide: function(userSelected){
    FlickityCarousal.selectSlide(userSelected,false);
  }
};

var BrowserDetection = {
  isIE11: function () {
    var ieVersion = this.getIEVersion();
    if (11 === ieVersion) {
      return true;
    } else {
      return false;
    }
  },
  getIEVersion: function () {
    var sAgent = window.navigator.userAgent;
    var Idx = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (Idx > 0)
      return parseInt(sAgent.substring(Idx + 5, sAgent.indexOf(".", Idx)));

    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
      return 11;

    else
      return 0; //It is not IE
  },
  isIOS: function () {
    if (navigator.userAgent.match(/(\(iPod|\(iPhone|\(iPad)/)){
      return true;
    }
    else{
      return false;
    }
  }
};

var CustomTheme = {
  isCustomPage: function(){
    return (window.location.href.indexOf('/pages/get-started') > -1 ? true : false);
  },
  fetchAjaxProductsURL: function(newUrl, tags, collectionURL, sortBy) {
    // Create AJAX URL to load products versus the FULL page reload.
      newUrl = collectionURL + '/' + tags + '?view=data&sort_by=' + sortBy;
      return newUrl;
  },
  resetFilterProducts: function(e) {

  },
  animateToTop: function(){
    $([document.documentElement, document.body]).animate({
      scrollTop: 0
    }, 1800);
  },
  animateScrollBarPostFilter: function(){
      $([document.documentElement, document.body]).animate({
        scrollTop: $("#shopify-section-product-subscription-collection-template").offset().top
      }, 2000);

      $('.get-started-carousel').data('flickity').reloadCells();
        Cart.addColorToSelectedProduct();
    
  },
  pushTemperoryTags: function(p, temporaryTags) {
    var ele = document.querySelector('.product-subscription-template .Collapsible__Inner .Linklist li.is-selected');
    var activeSibling = null;
    if(ele != null && typeof(p) === "object") {
      temporaryTags = [];
      activeSibling = ele.closest('.Collapsible').querySelector('.is-active');
      temporaryTags.push(activeSibling.getAttribute('data-tag'));
    }
    
    if(ele !== null && 
        temporaryTags.length === 0 
        && (p !== undefined && p !== 'reset')) {            
      
      activeSibling = ele.closest('.Collapsible').querySelector('.is-active');
      temporaryTags.push(activeSibling.getAttribute('data-tag'));
    }          

    return temporaryTags;
  }
};