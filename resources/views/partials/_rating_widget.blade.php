<script type="text/javascript">(function(d, t, e, m){

// Async Rating-Widget initialization.
window.RW_Async_Init = function(){
            
    RW.init({
        huid: "362618",
        uid: "74fffb34f9f1f493aa037adee253526b",
        source: "website",
        options: {
            "advanced": {
                "layout": {
                    "dir": "rtl"
                },
                "font": {
                    "size": "9px",
                    "italic": true
                }
            },
            "size": "tiny",
            "style": "green",
            "isDummy": false
        } 
    });
    RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));
</script>