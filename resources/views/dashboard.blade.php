<x-layout>
    <div class="container-fluid first-container ">
        
        
        <img class="img-bg" src="/media/background.jpg" alt="">
        <div class="container second-container d-flex align-items-center">
            @foreach ($results as $elemento)
            <div class="row mt-5 " data-aos="fade-right" data-aos-duration="1000">
                <div class="col-12 ">
                    <h1 class="text-center mt-5 section-border p-3"> {{__('ui.title_status')}} <strong>{{ $elemento['domain_name'] }}</strong></h1>
                    
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="#overview" class="button-down" data-label="{{ __('ui.scopri') }}">
                        <svg class="svgIcon" viewBox="0 0 384 512">
                            <path
                            id="XMLID_225_"
                            d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"
                            ></path>
                            
                            
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        
        
        <div class="container third-container mt-5 mb-4">
            
            @foreach ($results as $elemento)
            
            {{-- risk score --}}
            <div id="overview" class="row justify-content-center mt-5 mb-5" data-aos="fade-left" data-aos-duration="1000">
                <div class="col-12 d-flex flex-column align-items-center ">
                    <p class="fs-6 mb-4 text-center">{{__('ui.overview_desc')}}</p>
                    
                    <div class="card h-100 cardRisk">
                        <h5 class="card-title ">{{__('ui.risk_score')}}</h5>
                        
                        <p class="card-text"> {{ $elemento['risk_score'] }}/100</p>
                    </div>
                </div>
            </div>
            
            
            {{-- Score Cards --}}
            <div id="punteggi" class="container g-3 mt-5 mb-5 " data-aos="fade-right" data-aos-duration="1000">
                <div class="row">
                    <div class="col-12 d-flex flex-column align-items-center mb-3 ">
                        <h3 class="text-center mb-4 fs-1 fw-bold">{{__('ui.sec_scores')}}</h3>
                        <p class="fs-6 text-center ">{{__('ui.sec_scores_desc')}}</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach($scores as $label => $value)
                    <div class="col-md-6 col-lg-3 col-custom">
                        <div class="card  h-100 cardsScore" >
                            <div class="card-body card-body-custom-score">
                                <div class="d-flex justify-content-center align-items-center gap-4 ">
                                    
                                    <h5 class="card-title">{{ $label }}</h5>
                                    <i class="fa-solid fa-circle-exclamation mb-2 text-danger"></i>
                                </div>
                                <p class="card-text fs-3">{{ $value }}/100</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            
            {{-- vulnerabilità --}}
            <div id="vulnerabilities" class="row g-3 mt-5 mb-5">
                <div class="col-12">
                    <div class="row">
                        <!-- Colonna sinistra: Titolo e descrizione -->
                        <div class="col-md-6 d-flex flex-column justify-content-center  col-custom-mobile "  data-aos="fade-right" data-aos-duration="1000">
                            <h3 class="text-center fs-1 fw-bold mb-4 ">{{__('ui.vulnerabilities')}}</h3>
                            <p class="fs-6 text-center lh-lg">
                                {{__('ui.vuln_desc')}}
                            </p>
                        </div>
                        
                        
                        <div class="col-md-6 d-flex justify-content-around align-items-center" data-aos="fade-left" data-aos-duration="1000">
                            @foreach($elemento['n_vulns'] as $tipo => $valori)
                            @php
                            $modalId = 'modal-' . \Illuminate\Support\Str::slug($tipo);
                            @endphp
                            <button type="button" class="btn btn-custom-modal mb-3 text-uppercase" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                                {{ $tipo }}
                            </button>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            
            {{-- modal vulnerabilità--}}
            @foreach($elemento['n_vulns'] as $tipo => $valori)
            @php
            $modalId = 'modal-' . \Illuminate\Support\Str::slug($tipo);
            @endphp
            <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-uppercase" id="{{ $modalId }}Label">{{ $tipo }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                        </div>
                        <div class="modal-body">
                            @foreach($valori as $livello => $n)
                            <p class="mb-1"><span>{{ ucfirst($livello) }}:</span> {{ $n }}</p>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-custom-modal" data-bs-dismiss="modal">{{__('ui.close_btn')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            
            
            {{-- Email & Certificati --}}
            <div id="email" class="row g-3 mt-5 mb-5 ">
                <div class="row ">
                    <div class="col-12 d-flex flex-column mb-4 align-items-center">
                        <h3 class="text-center mb-4 fs-1 fw-bold">{{__('ui.email_certs')}}</h3>
                        <p class="fs-6 text-center">{{__('ui.email_certs_desc')}}
                        </p>
                    </div>
                </div>
                <div class="row row-custom " data-aos="fade-right" data-aos-duration="1000">
                    <div class="col-md-6">
                        <div class="card text-white mb-3 bg-blue" >
                            <div class="card-header">{{__('ui.email_security')}}</div>
                            <div class="card-body">
                                <p><strong>Spoofing:</strong> {{ $elemento['email_security']['spoofable'] }}</p>
                                <p><strong>DMARC:</strong> {{ $elemento['email_security']['dmarc_policy'] }}</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white mb-3 bg-blue" >
                            <div class="card-header">{{__('ui.certificates')}}</div>
                            <div class="card-body">
                                <p><strong>{{__('ui.cert_active')}}:</strong> {{ $elemento['n_cert_attivi'] }}</p>
                                <p><strong>{{__('ui.cert_expired')}}:</strong> {{ $elemento['n_cert_scaduti'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Rete & Infrastruttura --}}
            <div id="rete" class="row g-3 mt-5 mb-5">
                <div class="row ">
                    <div class="col-12 d-flex flex-column mb-4 align-items-center">
                        <h3 class="text-center mb-4 fs-1 fw-bold">{{__('ui.network_infra')}}</h3>
                        <P class="fs-6 text-center">{{__('ui.network_infra_desc')}}
                        </P>
                    </div>
                </div>
                <div class="row row-custom" data-aos="fade-left" data-aos-duration="1000">
                    <div class="col-md-6">
                        <div class="card text-white mb-3 bg-blue" >
                            <div class="card-header">{{__('ui.unique_ip')}}</div>
                            <div class="card-body">
                                <p><strong>IPv4:</strong> {{ $elemento['unique_ipv4'] }}</p>
                                <p><strong>IPv6:</strong> {{ $elemento['unique_ipv6'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white mb-3 bg-blue" >
                            <div class="card-header">CDN</div>
                            <div class="card-body">
                                @if(isset($elemento['cdn']['assets']) && count($elemento['cdn']['assets']) > 0)
                                <ul class="mb-0">
                                    @foreach($elemento['cdn']['assets'] as $cdnAsset)
                                    <li>{{ $cdnAsset }}</li>
                                    @endforeach
                                </ul>
                                @else
                                <p>{{__('ui.cdn_none')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Summary --}}
            
            <div id="summary" class="row g-3 mt-5 mb-5" >
                <div class="row">
                    <div class="col">
                        <h3 class="text-center mb-4 fs-1 fw-bold">{{__('ui.summary')}}</h3>
                    </div>
                </div>
                
                <div class="row bg-blue summary-row" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card-body p-4 ">
                        
                        
                        <div class="row mb-4 row-border-bottom ">
                            <div class="col-md-6 ">
                                <h5 class="fw-bold text-uppercase">{{__('ui.status')}}</h5>
                                <p class="mb-0 text-danger fw-bold">{{__('ui.status_critical')}}</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="fw-bold text-uppercase">{{__('ui.total_score')}}</h5>
                                <p class="mb-0 fw-bold">99 / 100</p>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4 row-border-bottom">
                            <div class="col-12">
                                <h5 class="fw-bold text-uppercase">{{__('ui.vulnerabilities_title')}}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.vuln_total')}}:</strong> 162</p>
                                <p class="mb-1"><strong>{{__('ui.vuln_critical_active')}}:</strong> 2</p>
                                <p class="mb-1"><strong>{{__('ui.vuln_high_passive')}}e:</strong> 18</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.vuln_medium')}}:</strong> 52 </p>
                                <p class="mb-1"><strong>{{__('ui.vuln_informative')}}:</strong> 90</p>
                                <p class="mb-1"><strong>{{__('ui.vuln_low')}}o:</strong> 0</p>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4 row-border-bottom">
                            <div class="col-12">
                                <h5 class="fw-bold text-uppercase">{{__('ui.services_exposure')}}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.assets_total')}}:</strong> 102</p>
                                <p class="mb-1"><strong>{{__('ui.ipv4_unique')}}:</strong> 30</p>
                                <p class="mb-1"><strong>{{__('ui.ipv6_unique')}}:</strong> 23</p>
                            </div>
                            <div class="col-md-8">
                                <p class="mb-1"><strong>{{__('ui.exposed_ports')}}:</strong></p>
                                <p class="mb-0">
                                    <code class="text-white">80</code> (68), <code class="text-white">443</code> (42), <code class="text-white">8800</code> (21), 
                                    <code class="text-white">53</code> (3), <code class="text-white">6667</code>, <code class="text-white">6697</code>,
                                    <code class="text-white">8080</code> (6)
                                </p>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4 row-border-bottom">
                            <div class="col-12">
                                <h5 class="fw-bold text-uppercase">{{__('ui.data_leaks')}}</h5>
                            </div>
                            <div class="col-md-4">
                                
                                <p class="mb-1"><strong>{{__('ui.vuln_total')}}:</strong> 838</p>
                                <p class="mb-1"><strong>{{__('ui.domain_stealer')}}:</strong> 1 </p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.potential_stealer')}}:</strong> 826</p>
                                <p class="mb-1"><strong>{{__('ui.other_stealer')}}:</strong> 11</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.vip_leaks')}}:</strong> 0</p>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4 row-border-bottom">
                            <div class="col-12">
                                <h5 class="fw-bold text-uppercase">{{__('ui.cert_tech')}}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.cert_active')}}:</strong> 15</p>
                                <p class="mb-1"><strong>{{__('ui.expired')}}:</strong> 18</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>{{__('ui.waf_active')}}:</strong> 4 asset</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1 text-danger"><strong>CDN:</strong> {{__('ui.cdn_absent')}}</p>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-4 row-border-bottom">
                            <div class="col-12">
                                <h5 class=" text-uppercase">{{__('ui.email_security_title')}}</h5>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Spoofing:</strong> {{__('ui.spoofing_possible')}}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>DMARC:</strong> quarantine</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Blacklist:</strong> {{__('ui.blacklist_none')}}</p>
                            </div>
                        </div>
                        
                        <div class="row row-border-bottom">
                            <p class="lh-lg">
                                {{__('ui.summary_text_1')}}
                                {{__('ui.summary_text_2')}}
                                
                            </p>
                            <p class="lh-lg">
                                {{__('ui.summary_text_3')}}
                            </p>
                            <p class="lh-lg">
                                {{__('ui.summary_text_4')}}
                            </p>
                            <p class="lh-lg">
                                {{__('ui.summary_text_5')}}
                            </p>
                            <p class="lh-lg">
                                {{__('ui.summary_text_6')}}
                            </p>
                        </div>
                        
                        
                        <div class="row pt-3" >
                            <div class="col">
                                <div class="alert custom-alert mt-2" role="contentinfo">
                                    {{__('ui.alert_critical')}}
                                </div>
                            </div>
                        </div>  
                        
                    </div>  
                </div>  
            </div>  
            
            @endforeach
        </div>
    </div>
    
</x-layout>