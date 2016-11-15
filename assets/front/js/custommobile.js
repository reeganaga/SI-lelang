  
      //OWL CAROUSEL MULTIPLE SLIDER
    $("#ornamen-atas").owlCarousel({
      autoPlay: 3000,
      navigationText: ["", ""],
      navigation: true,
      pagination: false,
      itemsCustom: [
        [0, 1],
        [768, 4]
      ]
    });
          //OWL CAROUSEL MULTIPLE SLIDER
    $("#ornamen-konten").owlCarousel({
      autoPlay: 3000,
      navigationText: ["", ""],
      navigation: true,
      pagination: false,
      itemsCustom: [
        [0, 1],
        [768, 4]
      ]
    });
          //OWL CAROUSEL MULTIPLE SLIDER
    $("#ornamen-bawah").owlCarousel({
      autoPlay: 3000,
      navigationText: ["", ""],
      navigation: true,
      pagination: false,
      itemsCustom: [
        [0, 1],
        [768, 4]
      ]
    });


// function ketika di klik gambarnya
  window.var_type_konten = "pop_konten1";

  function pop_atas1(e){
    // alert(e.getAttribute("src"));
    var item = e.getAttribute("src");
    //mengkonvert file name berdasarkan src gambar
    var file_ext = item.split('.').pop();
    var basename = baseName(item)+"."+file_ext;

    console.log(item);
    document.getElementById('pop_atas').src = item;
    document.getElementById('form_atas').value = basename;
  }

  function pop_konten(e){
    // alert(e.getAttribute("src"));
    var item = e.getAttribute("src");
    var type_konten = window.var_type_konten;

    //mengkonvert file name berdasarkan src gambar
    var file_ext = item.split('.').pop();
    var basename = baseName(item)+"."+file_ext;

    console.log("gambar item = "+item+", type = "+type_konten);
    console.log("basename file = "+basename);

    //set ke html
    document.getElementById(type_konten).src = item;
    document.getElementById('form_'+type_konten).value = basename;
  }

  function pop_bawah1(e){
    // alert(e.getAttribute("src"));
    var item = e.getAttribute("src");
    //mengkonvert file name berdasarkan src gambar
    var file_ext = item.split('.').pop();
    var basename = baseName(item)+"."+file_ext;

    console.log(item);
    document.getElementById('pop_bawah').src = item;
    document.getElementById('form_bawah').value = basename;
  }

  function type_konten(e){
    var type_konten = e.getAttribute("data-konten");
    window.var_type_konten = type_konten;
    console.log(window.var_type_konten);
  }

  function baseName(str)
  {
     var base = new String(str).substring(str.lastIndexOf('/') + 1); 
      if(base.lastIndexOf(".") != -1)       
          base = base.substring(0, base.lastIndexOf("."));
     return base;
  }



jQuery("#pilihkonten .btn").click(function(){
        jQuery("#pilihkonten .btn").removeClass('active-custom');
        jQuery(this).toggleClass('active-custom'); 
});



// function untuk protect image
      function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG")
          return false;
      }
      document.oncontextmenu = nocontext;
