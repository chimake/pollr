        $(document).ready(function() {
            var thepostid = $("#thepostid").html();
            var page = "infodonut";
            var dataString = "thepostid=" + thepostid + "&page=" + page;
            $.ajax({
                type: "POST",
                url: "plugin/handler.php",
                data: dataString,

                cache: false,
                success: function(result) {
                    jason = JSON.parse(result);
                    console.log(jason);
                    var firstOption = jason["response"][0];
                    var secondOption = jason["response"][1];
                    var thirdOption = jason["response"][2];
                    var fourthOption = jason["response"][3];
                    if (firstOption === undefined) {
                        firstOption = 0;
                    } else if (secondOption === undefined) {
                        secondOption = 0;
                        thirdOption = 0;
                        fourthOption = 0;
                    } else if (thirdOption === undefined) {
                        // alert("third empty");
                        thirdOption = 0;
                        fourthOption = 0;
                    }
                    $("#one").html(firstOption);
                    $("#two").html(secondOption);
                    $("#three").html(thirdOption);
                    $("#four").html(fourthOption);
                    // $("#jsontester").html(firstOption);
                    // alert(jason["response"][0]);
                    Morris.Donut({
                        element: 'morris-donut-example',
                        data: [
                            { label: "Option 1", value: firstOption },
                            { label: "Option 2", value: secondOption },
                            { label: "Option 3", value: thirdOption },
                            { label: "Option 4", value: fourthOption }
                        ],
                        behaveLikeLine: true,
                        gridLineColor: '#2f3e47',
                        gridTextColor: '#98a6ad',
                        hideHover: 'auto',
                        lineWidth: '3px',
                        pointSize: 0,
                        resize: true,
                        labelColor: '#fff',
                        colors: ['#ff8acc', '#5b69bc', "#35b8e0", "#fff"]
                    });

                }
            });
        });