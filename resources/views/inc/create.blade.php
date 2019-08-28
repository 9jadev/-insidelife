    {{-- <script defer src="{{ asset('js/app.js') }}"> </script> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/selectize.css') }}" />
    <script src="{{ asset('others/jquery.js') }}"> </script>
    <script src="{{ asset('dist/js/standalone/selectize.js') }}"> </script>
    <script src="{{ asset('dist/js/index.js') }}"> </script>
    <script>
        	
            $('#seoTags').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });
   
	</script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js "> </script>
        <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            };
        </script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' , options);
    </script>
    
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var button = document.querySelector("#uploadss");
        var hidden = document.querySelector(".field");

        var widget = cloudinary.createUploadWidget(
                {
                    cloudName: 'spring',
                    uploadPreset: 'wepb7cna',
                    sources: [
                        'local',
                        'url',
                        'camera',
                        'facebook',
                        'dropbox',
                        'instagram',
                    ],
                    resourceType: 'image',
                    showAdvancedOptions: false,
                    cropping: true,
                    multiple: false,
                    defaultSource: 'local',

                    styles: {
                        palette: {
                            window: '#FFFFFF',
                            sourceBg: '#FFFFFF',
                            windowBorder: '#8E9FBF',
                            tabIcon: '#FFFFFF',
                            inactiveTabIcon: '#8E9FBF',
                            menuIcons: '#2AD9FF',
                            link: '#08C0FF',
                            action: '#336BFF',
                            inProgress: '#00BFFF',
                            complete: '#33ff00',
                            error: '#EA2727',
                            textDark: '#000000',
                            textLight: '#FFFFFF',
                        },
                        fonts: {
                            default: null,
                            "'Space Mono', monospace": {
                                url:
                                    'https://fonts.googleapis.com/css?family=Space+Mono',
                                active: true,
                            },
                        },
                    },
                },
                (err, result) => {
                    if (result.event === 'success') {
                    button.value = result.info.url
                        
                    }
                }
            );
        button.addEventListener('click', function(){
            widget.open();
        });
    </script>
