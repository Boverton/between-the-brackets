

    $("#search_button").on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: "countries.php",
            dataType: "json",
            type: "POST",
            data: $("#search").serialize(),

            success: function (jsonData) {

                var country_name = jsonData.country_name;
                var capital = jsonData.capital;
                var region = jsonData.region;
                var population = jsonData.population;
                var languages = jsonData.languages;
                var error = jsonData.errors;

                if(typeof(error) != 'undefined') {
                    $("#country_details").html(
                        error);
                } else {
                    $("#country_details").html(
                        'Country: ' + country_name + '<br/>' +
                        'Capital: ' + capital + '<br/>' +
                        'Region: ' + region + '<br/>' +
                        'Population: ' + population + '<br/>' +
                        'Languages: ' + languages + '<br/>');
                }

                console.log(jsonData);
            }
        });

    });