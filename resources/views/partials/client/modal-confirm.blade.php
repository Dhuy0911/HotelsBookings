<!--booking-modal-wrap -->
<div class="booking-modal-wrap modal">
    <div style="width: 600px" class="booking-modal-container">
        <div style="padding: 20px" class="booking-modal-content fl-wrap">
            <div class="booking-modal-close color-bg">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div style="padding:0" class="bookiing-form-wrap">
                <!--   list-single-main-item -->
                <div style="overflow: auto" class="list-single-main-item fl-wrap hidden-section tr-sec">
                    <div class="profile-edit-container">
                        <div class="custom-form">
                        </div>
                        <div style="padding:0" class="box-widget-content">
                            <div class="box-widget-item-header">
                                <h3>Confirmation Booking</h3>
                            </div>
                            <form name="bookFormCalc" class="book-form custom-form">
                                <fieldset>
                                    <div class="cal-item">
                                        <div class="bookdate-container fl-wrap">
                                            <label><i class="fal fa-calendar-check"></i> When
                                            </label>
                                            <input type="text" placeholder="Date In-Out" name="bookdates"
                                                value="" />
                                            <div class="bookdate-container-dayscounter">
                                                <i class="far fa-question-circle"></i><span>Days :
                                                    <strong>0</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cal-item">
                                        <div class="quantity-item">
                                            <label>Rooms</label>
                                            <div class="quantity">
                                                <input name="no_rooms" type="number" min="1" step="1"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="quantity-item">
                                            <label>Adults</label>
                                            <div class="quantity">
                                                <input name="adult" type="number" min="1" step="1"
                                                    value="1">
                                            </div>
                                        </div>
                                        <div class="quantity-item">
                                            <label>Children</label>
                                            <div class="quantity">
                                                <input name="kids" type="number" min="0" step="1"
                                                    value="0">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="number" id="totaldays" name="qty5" class="hid-input" />
                                <button class="btnaplly confirm-btn color2-bg ">
                                    Confirm<i class="fal fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--   list-single-main-item end -->
            </div>
        </div>
    </div>

</div>
<div class="bmw-overlay"></div>
<!--booking-modal-wrap end -->

<script>
    $(document).ready(function() {
        $('.confirm-btn').on('click', function(e) {
            e.preventDefault();

            // Retrieve the data from session
            let sessionData = sessionStorage.getItem('header-search');
            let sessionValues = sessionData ? JSON.parse(sessionData) : {};

            // Get the new values

            let date = $('span.drp-selected').text();
            let arrDate = date.split('-');
            let checkInDate = arrDate[0];
            let checkOutDate = arrDate[1];
            let no_rooms = $('input[name="no_rooms"]').val(); 
            let adult = $('input[name="adult"]').val();
            let kids = $('input[name="kids"]').val();

            // Update the data object with new values
            let data = {

                checkInDate: checkInDate || sessionValues.checkInDate,
                checkOutDate: checkOutDate || sessionValues.checkOutDate,
                no_rooms: no_rooms || sessionValues.no_rooms,
                adult: adult || sessionValues.adult,
                kids: kids || sessionValues.kids
            };

            // Save the updated data to session
            sessionStorage.setItem('header-search', JSON.stringify(data));
            $('.booking-modal-wrap').css('display', 'none');
            $('.bmw-overlay').css('display', 'none');


        })


    })
</script>
