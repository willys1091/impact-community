@extends('layout.main')
@section('title', 'FAQ - Arif Furniture')
@section('container')
<!-- Blog Details Section Begin -->
<section class="blog-details spad py-0">
    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead d-flex">
        <div class="container h-100 py-5 my-auto">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light text-white">Frequently Asked Question</h1>
                    <p class="lead text-light">Pertanyaan yang sering diajukan</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row p-5">
            @php
                function check($number){ 
                    if($number % 2 == 0){ 
                        return false;
                        
                        //GENAP  
                    } 
                    else{ 
                       
                        return true;
                    } 
                }
                
                if (check(count($FAQ))==true) {
                    $count=floor(count($FAQ)/3);
                    $j=3;
                } else {
                    $count=floor(count($FAQ)/2);
                    $j=2;
                }
                $x=0;
                $ii=0;
                $k=0;
            @endphp
            
            @for ($i = 1; $i <= $j; $i++)
            @php
              
               //$ii=0;
               //$ii=($i*($ii+1))-1;
            @endphp    
            
                @if ($i!=$j)
                <div class="col-md-6 my-3">
                    <div class="accordion FAQ" id="accordion-tab-{{$i}}">
                        @for ($ii=0; $ii < $count; $ii++)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-{{$i}}-heading-{{$ii+1}}">
                                <h5>
                                    <button class="btn btn-link w-100" type="button" data-toggle="collapse"
                                        data-target="#accordion-tab-{{$i}}-content-{{$ii+1}}" aria-expanded="false"
                                        aria-controls="accordion-tab-{{$i}}-content-{{$ii+1}}">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>{{$FAQ[$k]->question}}</div>
                                            <div><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                        </div>
                                        
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-{{$i}}-content-{{$ii+1}}"
                                aria-labelledby="accordion-tab-{{$i}}-heading-{{$ii+1}}" data-parent="#accordion-tab-{{$i}}">
                                <div class="card-body">
                                    <p>{{$FAQ[$k]->answer}}</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $k++;
                        @endphp
                        @endfor
                    </div>
    
                </div>
                @else
                <div class="offset-md-3 col-md-6 my-3">
                    <div class="accordion FAQ" id="accordion-tab-{{$i}}">
                        @for ($ii=0; $ii < $count; $ii++)
                        <div class="card">
                            <div class="card-header" id="accordion-tab-{{$i}}-heading-{{$ii+1}}">
                                <h5>
                                    <button class="btn btn-link w-100" type="button" data-toggle="collapse"
                                        data-target="#accordion-tab-{{$i}}-content-{{$ii+1}}" aria-expanded="false"
                                        aria-controls="accordion-tab-{{$i}}-content-{{$ii+1}}">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div>{{$FAQ[$k]->question}}</div>
                                            <div><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                                        </div>
                                        
                                    </button>
                                </h5>
                            </div>
                            <div class="collapse" id="accordion-tab-{{$i}}-content-{{$ii+1}}"
                                aria-labelledby="accordion-tab-{{$i}}-heading-{{$ii+1}}" data-parent="#accordion-tab-{{$i}}">
                                <div class="card-body">
                                    <p>{{$FAQ[$k]->answer}}</p>
                                </div>
                            </div>
                        </div>
                        @php
                            $k++;
                        @endphp
                        @endfor
                    </div>
    
                </div>
                @endif
            @endfor
            
           
        </div>
        <div class="text-center">
            <h2><strong>Ada Pertanyaan khusus ?</strong></h2>
            <h4>Konsultasikan langsung dengan tim kami</h4>
            <h5>Respon Cepat Via Telepon & Whatsapp</h5>
        </div>
        
        <div class="row p-5">
            <div class="col-md-4 text-center">
                <div class="icon-big">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <h5 class="mb-2"><strong>Telepon</strong> </h5>
                <h6>+62 822-4166-6995</h6>
                <p><small>Gunakan Telepon Agar Komunikasi Berjalan Lebih Lancar Tanpa Hambatan</small></p>
            </div>
            <div class="col-md-4 text-center">
                <div class="icon-big">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </div>
                <h5 class="mb-2"><strong>Whatsapp</strong> </h5>
                <h6>+62 822-4166-6995</h6>
                <p><small>Dengan WhatsApp panggilan dan pengiriman pesan cepat text, foto, dan video</small></p>
            </div> <div class="col-md-4 text-center">
                <div class="icon-big">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                </div>
                <h5 class="mb-2"><strong>Agenda Meeting & Kunjungan</strong> </h5>
                
                <p><small>Tentukan Waktu Meeting & Kunjungan Ke Tempat Workshop Kami</small></p>
            </div>
        </div>
</section>
<!-- Blog Details Section End -->

@endsection