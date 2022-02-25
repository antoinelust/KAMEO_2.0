// Load home dynamics zones
$(document).ready(function () {
    // Ajax request for retrieve nessecary infos for the home page
    $.ajax({
        type: "get",
        url: "retrieve-home-data", // Route home
        dataType: "json",
        success: function (response) {
            if (response.response == 'success') {
                // Display info section data
                $("#info-section #info-section-firstname").html(response.data.user.firstname)
                $("#info-section #info-section-lastname").html(response.data.user.lastname)
                $("#info-section #info-section-logo").attr('src', '../storage/app/public/companies_logo/' + response.data.company.id + '.png')
                $("#info-section #info-section-logo").attr('alt', response.data.company.name)
                // Display dynamics widgets
                if(response.data.user.permission.includes("fleetManager")){
                    $widget1 = `
                        <div class="col-lg-4">
                            <div class="icon-box effect large fancy">
                                <div class="icon">
                                    <a id="clientsAndProspects-modal-btn">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </div>
                                <h3>Clients et prospects</h3>
                                <p class="text-primary" style="font-size:3em;">` + response.data.nbCompanies + `</p>
                            </div>
                        </div>
                    `;
                    $("#widget-list").append($widget1);
                    $widget2 = `
                        <div class="col-lg-4">
                            <div class="icon-box effect large fancy">
                                <div class="icon">
                                    <a id="entretiens-modal-btn">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </div>
                                <h3>Vue sur les entretiens</h3>
                                <p class="text-primary" style="font-size:3em;">` + response.data.entretiens + `</p>
                            </div>
                        </div>
                    `;
                    $("#widget-list").append($widget2);
                    $widget3 = `
                        <div class="col-lg-4">
                            <div class="icon-box effect large fancy">
                                <div class="icon">
                                    <a id="bikes-modal-btn">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </div>
                                <h3>Vue sur les vélos</h3>
                                <p class="text-primary" style="font-size:3em;">` + response.data.bikes + `</p>
                            </div>
                        </div>
                    `;
                    $("#widget-list").append($widget3);
                }
            }
            else {
                $.notify(
                    response.message,
                    response.response
                );
            }
        }
    });
    // Reaload tbn
    $("#info-section-reload").click(function (e){
        e.preventDefault();
        location.reload();
    });
});
