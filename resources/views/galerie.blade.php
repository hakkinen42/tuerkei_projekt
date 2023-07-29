@extends('layouts.app')

@section('title','Galerie')

@section('content')

    <div class="row">
     
        <div class="col-md-12">
            
                <div class="text-center display-2 text-light">GALERIE</div>
                
                <div class="card-body galeri_body ">
                    <div class="galeri_container">
                        <div class="panel active" style="background-image: url(/images/about1.jpg);">
                        <h3>Kapadokya</h3>
                        </div>
                        <div class="panel " style="background-image: url(/images/about2.jpg);">
                        <h3>Uzungöl</h3>
                        </div>
                        <div class="panel" style="background-image: url(/images/about3.jpg);">
                        <h3>Istanbul</h3>
                        </div>
                        <div class="panel" style="background-image: url(/images/about4.jpg);">
                        <h3>Taksim</h3>
                        </div>
                        <div class="panel" style="background-image: url(/images/about5.jpg);">
                        <h3>Ayasofya</h3>
                        </div>
                    </div>

                </div>
                <div class="container text-dark h3">
                    <p>Herzlich willkommen in unserer Galerie, in der Sie die schönsten Fotos der Türkei finden werden. Jedes Bild wurde ausgewählt, um die einzigartigen Schönheiten der Türkei zu zeigen.</p>

                    <p> Die Türkei ist bekannt für ihre Geschichte und ihre natürliche Schönheit. Der Bosporus in Istanbul, die Feenkamine von Kappadokien, die antiken Ruinen von Ephesos und die natürlichen Thermalbecken von Pamukkale sind nur einige der vielen Schönheiten des Landes, die den Besuchern unvergessliche Erfahrungen bieten.</p>

                    <p>Jedes Foto in unserer Galerie wurde ausgewählt, um Ihnen die Schönheiten der Türkei zu präsentieren und Ihnen bei der Erkundung dieses Landes zu helfen. Wir hoffen, dass diese Galerie eine Inspiration für alle sein wird, die die Türkei besuchen möchten und ihre Schönheiten entdecken wollen.</p>
                    <p>Genießen Sie die Fotos in unserer Galerie und lassen Sie sich von ihnen inspirieren, um die Schönheiten der Türkei zu entdecken!</p>
                </div>
            
        </div>
    </div>

@endsection


