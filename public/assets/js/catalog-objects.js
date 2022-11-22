function openObject($id) {
    $.ajax({
        type: "POST",
        url: "index.php?ajax=1&openObject=true",
        dataType: "json",
        data: {
            "id": $id
        },
        success: function(data) {
            if (data !== "error") {
                let modal = $('#toInsertModal');
                $('body').css({
                    'overflowY': 'hidden',
                })
                modal.css('display', 'flex');
                modal.html(data.text);

                $('.ajax-modal-close').click(function() {
                    modal.hide();
                    $('body').css({
                        'overflowY': 'visible',
                    })
                });

                $(document).keydown(function(e) {
                    if (e.keyCode === 27) {
                        e.stopPropagation();
                        modal.hide();
                        $('body').css({
                            'overflowY': 'visible',
                        })
                    }
                });

                modal.click(function(e) {
                    if ($(e.target).closest('.ajax-modal').length === 0) {
                        $(this).hide();
                        $('body').css({
                            'overflowY': 'visible',
                        })
                    }
                });

                $("#ajax-modal-slider").lightSlider({
                    item: 1,
                    loop:true,
                    keyPress: true,
                    currentPagerPosition: 'left',
                });

                // mapboxgl.accessToken = 'pk.eyJ1Ijoia29uZGFrb3YiLCJhIjoiY2w5d3l3bHk2MDU0NTN5cGk4b294ZThyaiJ9.oUqVR7L78ggiNqa7CMofNQ';
                // let point = [55.2768, 25.1850];
                //
                // let mapInModal = new mapboxgl.Map({
                //     container: 'mapInObject',
                //     style: 'mapbox://styles/mapbox/dark-v10',
                //     center: point,
                //     zoom: 16,
                //     scrollZoom: false,
                //     pitch: 20,
                //     doubleClickZoom: false,
                //     dragPan: false,
                //     dragRotate: false,
                // });
                //
                // mapInModal.on('load', () => {
                //     const marker = new mapboxgl.Marker({
                //         color: "#C72D37",
                //     }).setLngLat(point).addTo(mapInModal);
                // });
            } else {
                console.log('lol')
            }
        }
    });
}

