/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

// window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component("example", require("./components/Example.vue"));

// const app = new Vue({
//   el: "#app"
// });

$("#years").on("change", function() {
  var value = $(this).val();
  $(".changeYear").each(function(i) {
    var href = $(this)
      .attr("href")
      .replace("?year=2015", "")
      .replace("?year=2016", "")
      .replace("?year=2017", "")
      .replace("?year=2018", "");
    var yearVal = $("#years").val();
    $(this).attr("href", href + "?year=" + yearVal);
  });

  if (value == "All") {
    $("[id^=2015_],[id^=2016_],[id^=2017_],[id^=2018_]").show();
  } else if (value == "2015") {
    $("[id^=2015_]").show();
    $("[id^=2016_],[id^=2017_],[id^=2018_]").hide();
  } else if (value == "2016") {
    $("[id^=2016_]").show();
    $("[id^=2015_],[id^=2017_],[id^=2018_]").hide();
  } else if (value == "2017") {
    $("[id^=2017_]").show();
    $("[id^=2015_],[id^=2016_],[id^=2018_]").hide();
  } else if (value == "2018") {
    $("[id^=2018_]").show();
    $("[id^=2015_],[id^=2016_],[id^=2017_]").hide();
  }
});

// $("#chooseCar").click(function() {
//   $(this)
//     .find(".panel-body")
//     .css("background", "aliceblue");
// });

// $("#chooseCar").click(function() {
//   $("#compareDiv").show();
// });
