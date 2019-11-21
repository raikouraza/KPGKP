       var options = {
            bezierCurve: false,
            //animation: false
            onAnimationComplete: done
        };

        var data = [
            {
                value: 300,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Red"
            },
            {
                value: 50,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Green"
            },
            {
                value: 100,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Yellow"
            }
        ];

        $(document).ready(
      function () {
          var ctx = document.getElementById("myChart").getContext("2d");
          var myNewChart = new Chart(ctx).Pie(data, options);
      }
  );

        function done() {
            var url_base64 = document.getElementById("myChart").toDataURL("image/png");
            var url_base64jp = document.getElementById("myChart").toDataURL("image/jpg");

            link1.href = url_base64;
            link2.href=url_base64jp

            var url = link1.href.replace(/^data:image\/[^;]/, 'data:application/octet-stream');

        }