
    (function() {
      var baseURL = "https://cdn.shopify.com/shopifycloud/checkout-web/assets/";
      var scripts = ["https://cdn.shopify.com/shopifycloud/checkout-web/assets/runtime.baseline.en.2b502f1fd9ad2c09cc26.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/272.baseline.en.2de88d540797bbce9c45.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/36.baseline.en.b3de918b1f4e817fd6e6.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/40.baseline.en.d6a520bb358d9c8c47fc.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/app.baseline.en.e5f525fd0847fb77a480.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/240.baseline.en.9b24600641cb32831349.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/904.baseline.en.df5bf22ee90bdb044bb4.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/472.baseline.en.78481792f5bbdd87330c.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/44.baseline.en.aeece22cba81624a0248.js","https://cdn.shopify.com/shopifycloud/checkout-web/assets/OnePage.baseline.en.010d60f63ba632df561e.js"];
      var styles = ["https://cdn.shopify.com/shopifycloud/checkout-web/assets/272.baseline.en.04270ad3b1335258182d.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/app.baseline.en.bd7e1a04a0d2456be516.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/904.baseline.en.2b60ccea73a26508dcab.css","https://cdn.shopify.com/shopifycloud/checkout-web/assets/457.baseline.en.827248b7e0b6e6af28fb.css"];
      var fontPreconnectUrls = ["https://fonts.shopifycdn.com"];
      var fontPrefetchUrls = ["https://fonts.shopifycdn.com/roboto/roboto_n4.da808834c2315f31dd3910e2ae6b1a895d7f73f5.woff2?h1=d2Vnb3RraWNrc3ByLmNvbQ&hmac=42c401df5ea78a051756b46b191e49cffd7b3b95d1c151921e7ccff3ccbd0a79","https://fonts.shopifycdn.com/roboto/roboto_n5.126dd24093e910b23578142c0183010eb1f2b9be.woff2?h1=d2Vnb3RraWNrc3ByLmNvbQ&hmac=3084c3e30ebfbebac5553424cd0cecfb8c290a5b856eb0e732c3804e5229a5d2","https://fonts.shopifycdn.com/fjalla_one/fjallaone_n4.e3b041743e726c1cef3b3ab9921402e93cd8f733.woff2?h1=d2Vnb3RraWNrc3ByLmNvbQ&hmac=3c843289618678b552cbfe00fd210704b605497c41bdd28a3ad456ea49942bfd"];
      var imgPrefetchUrls = ["https://cdn.shopify.com/s/files/1/0729/6011/4971/files/IMG_0901_x320.png?v=1678294186"];

      function preconnect(url, callback) {
        var link = document.createElement('link');
        link.rel = 'dns-prefetch preconnect';
        link.href = url;
        link.crossOrigin = '';
        link.onload = link.onerror = callback;
        document.head.appendChild(link);
      }

      function preconnectAssets() {
        var resources = [baseURL].concat(fontPreconnectUrls);
        var index = 0;
        (function next() {
          var res = resources[index++];
          if (res) preconnect(res[0], next);
        })();
      }

      function prefetch(url, as, callback) {
        var link = document.createElement('link');
        if (link.relList.supports('prefetch')) {
          link.rel = 'prefetch';
          link.fetchPriority = 'low';
          link.as = as;
          if (as === 'font') link.type = 'font/woff2';
          link.href = url;
          link.crossOrigin = '';
          link.onload = link.onerror = callback;
          document.head.appendChild(link);
        } else {
          var xhr = new XMLHttpRequest();
          xhr.open('GET', url, true);
          xhr.onloadend = callback;
          xhr.send();
        }
      }

      function prefetchAssets() {
        var resources = [].concat(
          scripts.map(function(url) { return [url, 'script']; }),
          styles.map(function(url) { return [url, 'style']; }),
          fontPrefetchUrls.map(function(url) { return [url, 'font']; }),
          imgPrefetchUrls.map(function(url) { return [url, 'image']; })
        );
        var index = 0;
        (function next() {
          var res = resources[index++];
          if (res) prefetch(res[0], res[1], next);
        })();
      }

      function onLoaded() {
        preconnectAssets();
        prefetchAssets();
      }

      if (document.readyState === 'complete') {
        onLoaded();
      } else {
        addEventListener('load', onLoaded);
      }
    })();
  