<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 10px;
        width: 50%;
        text-align: center;
    }

    .currency,
    .country {
        display: inline-block;
        text-align: center;
        margin: 15px;
        cursor: pointer;
    }

    .currency img,
    .country img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        transition: transform 0.3s ease;
    }

    .currency img:hover,
    .country img:hover {
        transform: scale(1.1);
    }

    /* Hide the radio buttons */
    .currency input[type="radio"],
    .country input[type="radio"] {
        display: none;
    }

    #countryForm {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
        /* Adjust number of columns */
        gap: 15px;
        /* Space between items */
    }

    .country label {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 14px;
    }

    .country img {
        width: 40px;
        /* Adjust size of images */
        height: auto;
    }

    .country span {
        margin-top: 5px;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- First Modal -->
    <!-- Modal Structure -->
    <div id="firstModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Welcome to Pocket Option</h2>
            <p>Please complete your account setup to get started.</p>
            <button onclick="continueSetup()">Continue</button>
        </div>
    </div>

    <!-- Styles -->
    <style>
        /* Modal Background */
        .modal {
            display: block;
            /* Change to 'none' to hide initially */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s;
        }

        /* Close Button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        /* Modal Heading */
        .modal-content h2 {
            color: #1d3557;
            margin-bottom: 10px;
        }

        /* Modal Text */
        .modal-content p {
            color: #555;
            margin-bottom: 20px;
        }

        /* Continue Button */
        .modal-content button {
            background-color: #1d3557;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal-content button:hover {
            background-color: #457b9d;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <!-- JavaScript for Modal -->
    <script>
        function closeModal() {
      document.getElementById("firstModal").style.display = "none";
  }

  function continueSetup() {
      closeModal();
      // Add any additional setup actions here
  }
    </script>


    <!-- Country Selection Modal -->
    <div id="countryModal" class="modal">
        <div class="modal-content">
            <h2>Select a Country</h2>
            <form id="countryForm" method="POST" action="{{ route('saveCountry') }}">
                @csrf
                <div class="country">
                    <input type="radio" id="countryAfghanistan" name="country" value="Afghanistan">
                    <label for="countryAfghanistan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Afghanistan.svg"
                            alt="Afghanistan Flag">
                        <span>Afghanistan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAlbania" name="country" value="Albania">
                    <label for="countryAlbania">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/Flag_of_Albania.svg"
                            alt="Albania Flag">
                        <span>Albania</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAlgeria" name="country" value="Algeria">
                    <label for="countryAlgeria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_Algeria.svg"
                            alt="Algeria Flag">
                        <span>Algeria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAndorra" name="country" value="Andorra">
                    <label for="countryAndorra">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Andorra.svg"
                            alt="Andorra Flag">
                        <span>Andorra</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAngola" name="country" value="Angola">
                    <label for="countryAngola">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Flag_of_Angola.svg"
                            alt="Angola Flag">
                        <span>Angola</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryArgentina" name="country" value="Argentina">
                    <label for="countryArgentina">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg"
                            alt="Argentina Flag">
                        <span>Argentina</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAustralia" name="country" value="Australia">
                    <label for="countryAustralia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Flag_of_Australia.svg"
                            alt="Australia Flag">
                        <span>Australia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAustria" name="country" value="Austria">
                    <label for="countryAustria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_Austria.svg"
                            alt="Austria Flag">
                        <span>Austria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBangladesh" name="country" value="Bangladesh">
                    <label for="countryBangladesh">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Flag_of_Bangladesh.svg"
                            alt="Bangladesh Flag">
                        <span>Bangladesh</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBelgium" name="country" value="Belgium">
                    <label for="countryBelgium">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Belgium.svg"
                            alt="Belgium Flag">
                        <span>Belgium</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBrazil" name="country" value="Brazil">
                    <label for="countryBrazil">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Brazil.svg"
                            alt="Brazil Flag">
                        <span>Brazil</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBrazil" name="country" value="Brazil">
                    <label for="countryBrazil">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Flag_of_Brazil.svg"
                            alt="Brazil Flag">
                        <span>Brazil</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCambodia" name="country" value="Cambodia">
                    <label for="countryCambodia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg"
                            alt="Cambodia Flag">
                        <span>Cambodia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryChile" name="country" value="Chile">
                    <label for="countryChile">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Flag_of_Chile.svg"
                            alt="Chile Flag">
                        <span>Chile</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryDenmark" name="country" value="Denmark">
                    <label for="countryDenmark">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Denmark.svg"
                            alt="Denmark Flag">
                        <span>Denmark</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryEgypt" name="country" value="Egypt">
                    <label for="countryEgypt">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Egypt.svg"
                            alt="Egypt Flag">
                        <span>Egypt</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryFinland" name="country" value="Finland">
                    <label for="countryFinland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Finland.svg"
                            alt="Finland Flag">
                        <span>Finland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGhana" name="country" value="Ghana">
                    <label for="countryGhana">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Ghana.svg"
                            alt="Ghana Flag">
                        <span>Ghana</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIceland" name="country" value="Iceland">
                    <label for="countryIceland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Flag_of_Iceland.svg"
                            alt="Iceland Flag">
                        <span>Iceland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryItaly" name="country" value="Italy">
                    <label for="countryItaly">
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/03/Flag_of_Italy.svg" alt="Italy Flag">
                        <span>Italy</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySouthAfrica" name="country" value="South Africa">
                    <label for="countrySouthAfrica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Flag_of_South_Africa.svg"
                            alt="South Africa Flag">
                        <span>South Africa</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySwitzerland" name="country" value="Switzerland">
                    <label for="countrySwitzerland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f3/Flag_of_Switzerland.svg"
                            alt="Switzerland Flag">
                        <span>Switzerland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryThailand" name="country" value="Thailand">
                    <label for="countryThailand">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg"
                            alt="Thailand Flag">
                        <span>Thailand</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryItaly" name="country" value="Italy">
                    <label for="countryItaly">
                        <img src="https://upload.wikimedia.org/wikipedia/en/0/03/Flag_of_Italy.svg" alt="Italy Flag">
                        <span>Italy</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMexico" name="country" value="Mexico">
                    <label for="countryMexico">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_Mexico.svg"
                            alt="Mexico Flag">
                        <span>Mexico</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryRussia" name="country" value="Russia">
                    <label for="countryRussia">
                        <img src="https://upload.wikimedia.org/wikipedia/en/f/f3/Flag_of_Russia.svg" alt="Russia Flag">
                        <span>Russia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySouthAfrica" name="country" value="South Africa">
                    <label for="countrySouthAfrica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Flag_of_South_Africa.svg"
                            alt="South Africa Flag">
                        <span>South Africa</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySpain" name="country" value="Spain">
                    <label for="countrySpain">
                        <img src="https://upload.wikimedia.org/wikipedia/en/9/9a/Flag_of_Spain.svg" alt="Spain Flag">
                        <span>Spain</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySweden" name="country" value="Sweden">
                    <label for="countrySweden">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/4c/Flag_of_Sweden.svg" alt="Sweden Flag">
                        <span>Sweden</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryTurkey" name="country" value="Turkey">
                    <label for="countryTurkey">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Flag_of_Turkey.svg"
                            alt="Turkey Flag">
                        <span>Turkey</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUkraine" name="country" value="Ukraine">
                    <label for="countryUkraine">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Ukraine.svg"
                            alt="Ukraine Flag">
                        <span>Ukraine</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUnitedKingdom" name="country" value="United Kingdom">
                    <label for="countryUnitedKingdom">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/ae/Flag_of_the_United_Kingdom.svg"
                            alt="United Kingdom Flag">
                        <span>United Kingdom</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryVenezuela" name="country" value="Venezuela">
                    <label for="countryVenezuela">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/06/Flag_of_Venezuela.svg"
                            alt="Venezuela Flag">
                        <span>Venezuela</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryVietnam" name="country" value="Vietnam">
                    <label for="countryVietnam">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg"
                            alt="Vietnam Flag">
                        <span>Vietnam</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryArgentina" name="country" value="Argentina">
                    <label for="countryArgentina">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Flag_of_Argentina.svg"
                            alt="Argentina Flag">
                        <span>Argentina</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAustria" name="country" value="Austria">
                    <label for="countryAustria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Flag_of_Austria.svg"
                            alt="Austria Flag">
                        <span>Austria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBelgium" name="country" value="Belgium">
                    <label for="countryBelgium">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Belgium.svg"
                            alt="Belgium Flag">
                        <span>Belgium</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryChile" name="country" value="Chile">
                    <label for="countryChile">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Flag_of_Chile.svg"
                            alt="Chile Flag">
                        <span>Chile</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryColombia" name="country" value="Colombia">
                    <label for="countryColombia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg"
                            alt="Colombia Flag">
                        <span>Colombia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCzechRepublic" name="country" value="Czech Republic">
                    <label for="countryCzechRepublic">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cb/Flag_of_the_Czech_Republic.svg"
                            alt="Czech Republic Flag">
                        <span>Czech Republic</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryDenmark" name="country" value="Denmark">
                    <label for="countryDenmark">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Denmark.svg"
                            alt="Denmark Flag">
                        <span>Denmark</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryFinland" name="country" value="Finland">
                    <label for="countryFinland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/bc/Flag_of_Finland.svg"
                            alt="Finland Flag">
                        <span>Finland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGreece" name="country" value="Greece">
                    <label for="countryGreece">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_Greece.svg"
                            alt="Greece Flag">
                        <span>Greece</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIndonesia" name="country" value="Indonesia">
                    <label for="countryIndonesia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9f/Flag_of_Indonesia.svg"
                            alt="Indonesia Flag">
                        <span>Indonesia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIreland" name="country" value="Ireland">
                    <label for="countryIreland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/Flag_of_Ireland.svg"
                            alt="Ireland Flag">
                        <span>Ireland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNorway" name="country" value="Norway">
                    <label for="countryNorway">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d9/Flag_of_Norway.svg"
                            alt="Norway Flag">
                        <span>Norway</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryPortugal" name="country" value="Portugal">
                    <label for="countryPortugal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_Portugal.svg"
                            alt="Portugal Flag">
                        <span>Portugal</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryThailand" name="country" value="Thailand">
                    <label for="countryThailand">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_of_Thailand.svg"
                            alt="Thailand Flag">
                        <span>Thailand</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUnitedArabEmirates" name="country" value="United Arab Emirates">
                    <label for="countryUnitedArabEmirates">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_the_United_Arab_Emirates.svg"
                            alt="UAE Flag">
                        <span>United Arab Emirates</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUzbekistan" name="country" value="Uzbekistan">
                    <label for="countryUzbekistan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Flag_of_Uzbekistan.svg"
                            alt="Uzbekistan Flag">
                        <span>Uzbekistan</span>
                    </label>
                </div>

                <div class="country">
                    <input type="radio" id="countryCanada" name="country" value="Canada">
                    <label for="countryCanada">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cf/Flag_of_Canada.svg"
                            alt="Canada Flag">
                        <span>Canada</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryChina" name="country" value="China">
                    <label for="countryChina">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0b/Flag_of_China.svg"
                            alt="China Flag">
                        <span>China</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryFrance" name="country" value="France">
                    <label for="countryFrance">
                        <img src="https://upload.wikimedia.org/wikipedia/en/c/c3/Flag_of_France.svg" alt="France Flag">
                        <span>France</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGermany" name="country" value="Germany">
                    <label for="countryGermany">
                        <img src="https://upload.wikimedia.org/wikipedia/en/b/ba/Flag_of_Germany.svg"
                            alt="Germany Flag">
                        <span>Germany</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIndia" name="country" value="India">
                    <label for="countryIndia">
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg" alt="India Flag">
                        <span>India</span>
                    </label>
                </div>

                <div class="country">
                    <input type="radio" id="countryBangladesh" name="country" value="Bangladesh">
                    <label for="countryBangladesh">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f9/Flag_of_Bangladesh.svg"
                            alt="Bangladesh Flag">
                        <span>Bangladesh</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBolivia" name="country" value="Bolivia">
                    <label for="countryBolivia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/Flag_of_Bolivia.svg"
                            alt="Bolivia Flag">
                        <span>Bolivia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryEthiopia" name="country" value="Ethiopia">
                    <label for="countryEthiopia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/71/Flag_of_Ethiopia.svg"
                            alt="Ethiopia Flag">
                        <span>Ethiopia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGhana" name="country" value="Ghana">
                    <label for="countryGhana">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Ghana.svg"
                            alt="Ghana Flag">
                        <span>Ghana</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIraq" name="country" value="Iraq">
                    <label for="countryIraq">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f6/Flag_of_Iraq.svg" alt="Iraq Flag">
                        <span>Iraq</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryJamaica" name="country" value="Jamaica">
                    <label for="countryJamaica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Jamaica.svg"
                            alt="Jamaica Flag">
                        <span>Jamaica</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryKenya" name="country" value="Kenya">
                    <label for="countryKenya">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/Flag_of_Kenya.svg"
                            alt="Kenya Flag">
                        <span>Kenya</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLebanon" name="country" value="Lebanon">
                    <label for="countryLebanon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Flag_of_Lebanon.svg"
                            alt="Lebanon Flag">
                        <span>Lebanon</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMalaysia" name="country" value="Malaysia">
                    <label for="countryMalaysia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/66/Flag_of_Malaysia.svg"
                            alt="Malaysia Flag">
                        <span>Malaysia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMorocco" name="country" value="Morocco">
                    <label for="countryMorocco">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg"
                            alt="Morocco Flag">
                        <span>Morocco</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNepal" name="country" value="Nepal">
                    <label for="countryNepal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9b/Flag_of_Nepal.svg"
                            alt="Nepal Flag">
                        <span>Nepal</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNewZealand" name="country" value="New Zealand">
                    <label for="countryNewZealand">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3e/Flag_of_New_Zealand.svg"
                            alt="New Zealand Flag">
                        <span>New Zealand</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryPakistan" name="country" value="Pakistan">
                    <label for="countryPakistan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/32/Flag_of_Pakistan.svg"
                            alt="Pakistan Flag">
                        <span>Pakistan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySaudiArabia" name="country" value="Saudi Arabia">
                    <label for="countrySaudiArabia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0d/Flag_of_Saudi_Arabia.svg"
                            alt="Saudi Arabia Flag">
                        <span>Saudi Arabia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySouthKorea" name="country" value="South Korea">
                    <label for="countrySouthKorea">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/Flag_of_South_Korea.svg"
                            alt="South Korea Flag">
                        <span>South Korea</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySriLanka" name="country" value="Sri Lanka">
                    <label for="countrySriLanka">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/11/Flag_of_Sri_Lanka.svg"
                            alt="Sri Lanka Flag">
                        <span>Sri Lanka</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryVietnam" name="country" value="Vietnam">
                    <label for="countryVietnam">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg"
                            alt="Vietnam Flag">
                        <span>Vietnam</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryZimbabwe" name="country" value="Zimbabwe">
                    <label for="countryZimbabwe">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Flag_of_Zimbabwe.svg"
                            alt="Zimbabwe Flag">
                        <span>Zimbabwe</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAfghanistan" name="country" value="Afghanistan">
                    <label for="countryAfghanistan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Flag_of_Afghanistan.svg"
                            alt="Afghanistan Flag">
                        <span>Afghanistan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAlgeria" name="country" value="Algeria">
                    <label for="countryAlgeria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_Algeria.svg"
                            alt="Algeria Flag">
                        <span>Algeria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAndorra" name="country" value="Andorra">
                    <label for="countryAndorra">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Andorra.svg"
                            alt="Andorra Flag">
                        <span>Andorra</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAngola" name="country" value="Angola">
                    <label for="countryAngola">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Flag_of_Angola.svg"
                            alt="Angola Flag">
                        <span>Angola</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryArmenia" name="country" value="Armenia">
                    <label for="countryArmenia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Flag_of_Armenia.svg"
                            alt="Armenia Flag">
                        <span>Armenia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAzerbaijan" name="country" value="Azerbaijan">
                    <label for="countryAzerbaijan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Flag_of_Azerbaijan.svg"
                            alt="Azerbaijan Flag">
                        <span>Azerbaijan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBhutan" name="country" value="Bhutan">
                    <label for="countryBhutan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Flag_of_Bhutan.svg"
                            alt="Bhutan Flag">
                        <span>Bhutan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBotswana" name="country" value="Botswana">
                    <label for="countryBotswana">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Flag_of_Botswana.svg"
                            alt="Botswana Flag">
                        <span>Botswana</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCambodia" name="country" value="Cambodia">
                    <label for="countryCambodia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_Cambodia.svg"
                            alt="Cambodia Flag">
                        <span>Cambodia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCameroon" name="country" value="Cameroon">
                    <label for="countryCameroon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Flag_of_Cameroon.svg"
                            alt="Cameroon Flag">
                        <span>Cameroon</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCostaRica" name="country" value="Costa Rica">
                    <label for="countryCostaRica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Flag_of_Costa_Rica.svg"
                            alt="Costa Rica Flag">
                        <span>Costa Rica</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCyprus" name="country" value="Cyprus">
                    <label for="countryCyprus">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Flag_of_Cyprus.svg"
                            alt="Cyprus Flag">
                        <span>Cyprus</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryDjibouti" name="country" value="Djibouti">
                    <label for="countryDjibouti">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Flag_of_Djibouti.svg"
                            alt="Djibouti Flag">
                        <span>Djibouti</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryElSalvador" name="country" value="El Salvador">
                    <label for="countryElSalvador">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Flag_of_El_Salvador.svg"
                            alt="El Salvador Flag">
                        <span>El Salvador</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryEstonia" name="country" value="Estonia">
                    <label for="countryEstonia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8f/Flag_of_Estonia.svg"
                            alt="Estonia Flag">
                        <span>Estonia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryFiji" name="country" value="Fiji">
                    <label for="countryFiji">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Flag_of_Fiji.svg" alt="Fiji Flag">
                        <span>Fiji</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryHonduras" name="country" value="Honduras">
                    <label for="countryHonduras">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Flag_of_Honduras.svg"
                            alt="Honduras Flag">
                        <span>Honduras</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLuxembourg" name="country" value="Luxembourg">
                    <label for="countryLuxembourg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Flag_of_Luxembourg.svg"
                            alt="Luxembourg Flag">
                        <span>Luxembourg</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUganda" name="country" value="Uganda">
                    <label for="countryUganda">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Flag_of_Uganda.svg"
                            alt="Uganda Flag">
                        <span>Uganda</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIceland" name="country" value="Iceland">
                    <label for="countryIceland">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Flag_of_Iceland.svg"
                            alt="Iceland Flag">
                        <span>Iceland</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryIran" name="country" value="Iran">
                    <label for="countryIran">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Flag_of_Iran.svg" alt="Iran Flag">
                        <span>Iran</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryJamaica" name="country" value="Jamaica">
                    <label for="countryJamaica">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Flag_of_Jamaica.svg"
                            alt="Jamaica Flag">
                        <span>Jamaica</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryKazakhstan" name="country" value="Kazakhstan">
                    <label for="countryKazakhstan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d3/Flag_of_Kazakhstan.svg"
                            alt="Kazakhstan Flag">
                        <span>Kazakhstan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryKyrgyzstan" name="country" value="Kyrgyzstan">
                    <label for="countryKyrgyzstan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Flag_of_Kyrgyzstan.svg"
                            alt="Kyrgyzstan Flag">
                        <span>Kyrgyzstan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLaos" name="country" value="Laos">
                    <label for="countryLaos">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/56/Flag_of_Laos.svg" alt="Laos Flag">
                        <span>Laos</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLatvia" name="country" value="Latvia">
                    <label for="countryLatvia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/84/Flag_of_Latvia.svg"
                            alt="Latvia Flag">
                        <span>Latvia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLesotho" name="country" value="Lesotho">
                    <label for="countryLesotho">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Flag_of_Lesotho.svg"
                            alt="Lesotho Flag">
                        <span>Lesotho</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMalawi" name="country" value="Malawi">
                    <label for="countryMalawi">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d1/Flag_of_Malawi.svg"
                            alt="Malawi Flag">
                        <span>Malawi</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMaldives" name="country" value="Maldives">
                    <label for="countryMaldives">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Flag_of_Maldives.svg"
                            alt="Maldives Flag">
                        <span>Maldives</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMoldova" name="country" value="Moldova">
                    <label for="countryMoldova">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/Flag_of_Moldova.svg"
                            alt="Moldova Flag">
                        <span>Moldova</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMongolia" name="country" value="Mongolia">
                    <label for="countryMongolia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4c/Flag_of_Mongolia.svg"
                            alt="Mongolia Flag">
                        <span>Mongolia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNamibia" name="country" value="Namibia">
                    <label for="countryNamibia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/00/Flag_of_Namibia.svg"
                            alt="Namibia Flag">
                        <span>Namibia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNicaragua" name="country" value="Nicaragua">
                    <label for="countryNicaragua">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Nicaragua.svg"
                            alt="Nicaragua Flag">
                        <span>Nicaragua</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryOman" name="country" value="Oman">
                    <label for="countryOman">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Flag_of_Oman.svg" alt="Oman Flag">
                        <span>Oman</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryPanama" name="country" value="Panama">
                    <label for="countryPanama">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ab/Flag_of_Panama.svg"
                            alt="Panama Flag">
                        <span>Panama</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryQatar" name="country" value="Qatar">
                    <label for="countryQatar">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_Qatar.svg"
                            alt="Qatar Flag">
                        <span>Qatar</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countrySlovakia" name="country" value="Slovakia">
                    <label for="countrySlovakia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e6/Flag_of_Slovakia.svg"
                            alt="Slovakia Flag">
                        <span>Slovakia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryTanzania" name="country" value="Tanzania">
                    <label for="countryTanzania">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/Flag_of_Tanzania.svg"
                            alt="Tanzania Flag">
                        <span>Tanzania</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUruguay" name="country" value="Uruguay">
                    <label for="countryUruguay">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fe/Flag_of_Uruguay.svg"
                            alt="Uruguay Flag">
                        <span>Uruguay</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryZambia" name="country" value="Zambia">
                    <label for="countryZambia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/06/Flag_of_Zambia.svg"
                            alt="Zambia Flag">
                        <span>Zambia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAndorra" name="country" value="Andorra">
                    <label for="countryAndorra">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Flag_of_Andorra.svg"
                            alt="Andorra Flag">
                        <span>Andorra</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAngola" name="country" value="Angola">
                    <label for="countryAngola">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Flag_of_Angola.svg"
                            alt="Angola Flag">
                        <span>Angola</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryArmenia" name="country" value="Armenia">
                    <label for="countryArmenia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Flag_of_Armenia.svg"
                            alt="Armenia Flag">
                        <span>Armenia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryAzerbaijan" name="country" value="Azerbaijan">
                    <label for="countryAzerbaijan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/dd/Flag_of_Azerbaijan.svg"
                            alt="Azerbaijan Flag">
                        <span>Azerbaijan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBahamas" name="country" value="Bahamas">
                    <label for="countryBahamas">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Flag_of_the_Bahamas.svg"
                            alt="Bahamas Flag">
                        <span>Bahamas</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBarbados" name="country" value="Barbados">
                    <label for="countryBarbados">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Flag_of_Barbados.svg"
                            alt="Barbados Flag">
                        <span>Barbados</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBelarus" name="country" value="Belarus">
                    <label for="countryBelarus">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/85/Flag_of_Belarus.svg"
                            alt="Belarus Flag">
                        <span>Belarus</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBhutan" name="country" value="Bhutan">
                    <label for="countryBhutan">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Flag_of_Bhutan.svg"
                            alt="Bhutan Flag">
                        <span>Bhutan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBolivia" name="country" value="Bolivia">
                    <label for="countryBolivia">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Flag_of_Bolivia.svg"
                            alt="Bolivia Flag">
                        <span>Bolivia</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBrunei" name="country" value="Brunei">
                    <label for="countryBrunei">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Flag_of_Brunei.svg"
                            alt="Brunei Flag">
                        <span>Brunei</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryBurundi" name="country" value="Burundi">
                    <label for="countryBurundi">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/50/Flag_of_Burundi.svg"
                            alt="Burundi Flag">
                        <span>Burundi</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryCapeVerde" name="country" value="Cape Verde">
                    <label for="countryCapeVerde">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/38/Flag_of_Cape_Verde.svg"
                            alt="Cape Verde Flag">
                        <span>Cape Verde</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryChad" name="country" value="Chad">
                    <label for="countryChad">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4b/Flag_of_Chad.svg" alt="Chad Flag">
                        <span>Chad</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryComoros" name="country" value="Comoros">
                    <label for="countryComoros">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/94/Flag_of_the_Comoros.svg"
                            alt="Comoros Flag">
                        <span>Comoros</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryDjibouti" name="country" value="Djibouti">
                    <label for="countryDjibouti">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/Flag_of_Djibouti.svg"
                            alt="Djibouti Flag">
                        <span>Djibouti</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryEswatini" name="country" value="Eswatini">
                    <label for="countryEswatini">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Flag_of_Eswatini.svg"
                            alt="Eswatini Flag">
                        <span>Eswatini</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGabon" name="country" value="Gabon">
                    <label for="countryGabon">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Flag_of_Gabon.svg"
                            alt="Gabon Flag">
                        <span>Gabon</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryGuatemala" name="country" value="Guatemala">
                    <label for="countryGuatemala">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Flag_of_Guatemala.svg"
                            alt="Guatemala Flag">
                        <span>Guatemala</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryHonduras" name="country" value="Honduras">
                    <label for="countryHonduras">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/82/Flag_of_Honduras.svg"
                            alt="Honduras Flag">
                        <span>Honduras</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryLuxembourg" name="country" value="Luxembourg">
                    <label for="countryLuxembourg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/da/Flag_of_Luxembourg.svg"
                            alt="Luxembourg Flag">
                        <span>Luxembourg</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryMauritius" name="country" value="Mauritius">
                    <label for="countryMauritius">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/77/Flag_of_Mauritius.svg"
                            alt="Mauritius Flag">
                        <span>Mauritius</span>
                    </label>
                </div>


                <div class="country">
                    <input type="radio" id="countryJapan" name="country" value="Japan">
                    <label for="countryJapan">
                        <img src="https://upload.wikimedia.org/wikipedia/en/9/9e/Flag_of_Japan.svg" alt="Japan Flag">
                        <span>Japan</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryNigeria" name="country" value="Nigeria">
                    <label for="countryNigeria">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/79/Flag_of_Nigeria.svg"
                            alt="Nigeria Flag">
                        <span>Nigeria</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryUnitedStates" name="country" value="United States">
                    <label for="countryUnitedStates">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg"
                            alt="United States Flag">
                        <span>United States</span>
                    </label>
                </div>
                <div class="country">
                    <input type="radio" id="countryZimbabwe" name="country" value="Zimbabwe">
                    <label for="countryZimbabwe">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Flag_of_Zimbabwe.svg"
                            alt="Zimbabwe Flag">
                        <span>Zimbabwe</span>
                    </label>
                </div>
            </form>


        </div>
    </div>

    <!-- Currency Selection Modal -->
    <div id="currencyModal" class="modal">
        <div class="modal-content">
            <h2>Select a Currency</h2>
            <form id="currencyForm" method="POST" action="{{ route('saveCurrency') }}">
                @csrf
                <div class="currency">
                    <input type="radio" id="currencyUSD" name="currency" value="USD">
                    <label for="currencyUSD">
                        <img src="{{ asset('images/dollar.png') }}" alt="USD">
                        <span>USD</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyEUR" name="currency" value="EUR">
                    <label for="currencyEUR">
                        <img src="{{ asset('images/euro.png') }}" alt="EUR">
                        <span>EUR</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyGBP" name="currency" value="GBP">
                    <label for="currencyGBP">
                        <img src="{{ asset('images/gbp.png') }}" alt="GBP">
                        <span>GBP</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyJPY" name="currency" value="JPY">
                    <label for="currencyJPY">
                        <img src="{{ asset('images/yen.png') }}" alt="JPY">
                        <span>JPY</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyAUD" name="currency" value="AUD">
                    <label for="currencyAUD">
                        <img src="{{ asset('images/aud.png') }}" alt="AUD">
                        <span>AUD</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyCAD" name="currency" value="CAD">
                    <label for="currencyCAD">
                        <img src="{{ asset('images/canadian-dollar.png') }}" alt="CAD">
                        <span>CAD</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyCHF" name="currency" value="CHF">
                    <label for="currencyCHF">
                        <img src="{{ asset('images/swiss-franc.png') }}" alt="CHF">
                        <span>CHF</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyCNY" name="currency" value="CNY">
                    <label for="currencyCNY">
                        <img src="{{ asset('images/cny.png') }}" alt="CNY">
                        <span>CNY</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyINR" name="currency" value="INR">
                    <label for="currencyINR">

                        <img src="{{ asset('images/rupee-indian.png') }}" alt="INR">
                        <span>INR</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyBRL" name="currency" value="BRL">
                    <label for="currencyBRL">
                        <img src="{{ asset('images/brazilian-real.png') }}" alt="BRL">
                        <span>BRL</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyZAR" name="currency" value="ZAR">
                    <label for="currencyZAR">
                        <img src="{{ asset('images/rand.png') }}" alt="ZAR">
                        <span>ZAR</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyMXN" name="currency" value="MXN">
                    <label for="currencyMXN">
                        <img src="{{ asset('images/mxn.png') }}" alt="MXN">
                        <span>MXN</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencySGD" name="currency" value="SGD">
                    <label for="currencySGD">
                        <img src="{{ asset('images/sgd.png') }}" alt="SGD">
                        <span>SGD</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyHKD" name="currency" value="HKD">
                    <label for="currencyHKD">
                        <img src="{{ asset('images/hkd.png') }}" alt="HKD">
                        <span>HKD</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyKRW" name="currency" value="KRW">
                    <label for="currencyKRW">
                        <img src="{{ asset('images/krw.png') }}" alt="KRW">
                        <span>KRW</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyRUB" name="currency" value="RUB">
                    <label for="currencyRUB">
                        <img src="{{ asset('images/rub.png') }}" alt="RUB">
                        <span>RUB</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyTRY" name="currency" value="TRY">
                    <label for="currencyTRY">
                        <img src="{{ asset('images/try.png') }}" alt="TRY">
                        <span>TRY</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyIDR" name="currency" value="IDR">
                    <label for="currencyIDR">
                        <img src="{{ asset('images/idr.png') }}" alt="IDR">
                        <span>IDR</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyMYR" name="currency" value="MYR">
                    <label for="currencyMYR">
                        <img src="{{ asset('images/myr.png') }}" alt="MYR">
                        <span>MYR</span>
                    </label>
                </div>
                <div class="currency">
                    <input type="radio" id="currencyTHB" name="currency" value="THB">
                    <label for="currencyTHB">
                        <img src="{{ asset('images/thb.png') }}" alt="THB">
                        <span>THB</span>
                    </label>
                </div>

                <div class="currency">
                    <input type="radio" id="currencyNGN" name="currency" value="NGN">
                    <label for="currencyNGN">
                        <img src="{{ asset('images/naira.png') }}" alt="NGN">
                        <span>NGN</span>
                    </label>
                </div>

                <div class="currency">
                    <input type="radio" id="currencyPULA" name="currency" value="PULA">
                    <label for="currencyPULA">
                        <img src="{{ asset('images/pula.png') }}" alt="PULA">
                        <span>PULA</span>
                    </label>
                </div>
                <!-- Add more currencies as needed -->
            </form>

        </div>
    </div>

    <!-- Final Modal -->
    <div id="finalModal" class="modal">
        <div class="modal-content">
            <div class="check-icon" style="text-align: center; margin-bottom: 10px;">
                <i class="fas fa-check-circle" style="color: green; font-size: 48px;"></i>
            </div>
            <h2>Configuration Complete!</h2>
            <p>Pocket option will now refresh.</p>
        </div>
    </div>

    <script>
        function showModal(id) {
        document.querySelectorAll('.modal').forEach(modal => modal.style.display = "none");
        document.getElementById(id).style.display = "block";
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Show the first modal on page load
        showModal("firstModal");

        // After 5 seconds, show the country selection modal
        setTimeout(() => {
            showModal("countryModal");
        }, 5000);
    });

    // Country selection and save logic
    document.querySelectorAll('input[name="country"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const formData = new FormData(document.getElementById('countryForm'));

            fetch("{{ route('saveCountry') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show the currency modal
                    showModal("currencyModal");
                } else {
                    alert("There was an error saving your selection. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        });
    });


    // Currency selection and save logic
// Currency selection and save logic
document.querySelectorAll('input[name="currency"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const formData = new FormData(document.getElementById('currencyForm'));

        fetch("{{ route('saveCurrency') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show the final modal
                showModal("finalModal");
                setTimeout(() => {
                    document.getElementById("finalModal").style.display = "none";
                    // Redirect to the home page
                    window.location.href = "{{ route('home') }}";
                }, 3000); // 3 seconds delay before redirect
            } else {
                alert("Error saving your selection: " + (data.message || "Please try again."));
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An unexpected error occurred. Please try again later.");
        });
    });
});

    </script>




    <style>
        /* Modal styles */
        .modal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 9999;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .modal-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 0.9rem;
            color: #444;
            display: block;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            border-color: #007bff;
        }

        .btn-verify {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-verify:hover {
            background-color: #0056b3;
        }
    </style>
    <style>
        .site-footer {
            background-color: #f8f9fa;
            padding: 20px;
            position: fixed;
            display: flex;
            width: 100%;
            bottom: 0;
            justify-content: center;
            align-items: center;
            border-top: 1px solid #ddd;
        }

        .footer-container {
            display: flex;
            justify-content: space-between;
            /* Spread items out */
            align-items: center;
            width: 100%;
            /* Ensures full width */
            max-width: 1200px;
        }

        .toggle-section,
        .auto-trade-section {
            display: flex;
            align-items: center;
        }

        .toggle-section strong {
            margin-left: 10px;
        }

        .auto-trade-section font {
            margin-left: 5px;
        }
    </style>

    <script>
        // Toggle visibility of the 'other' document type field
    function toggleOtherField() {
        const documentType = document.getElementById('documentType').value;
        const otherField = document.getElementById('otherField');
        if (documentType === 'other') {
            otherField.style.display = 'block';
        } else {
            otherField.style.display = 'none';
        }
    }
    </script>