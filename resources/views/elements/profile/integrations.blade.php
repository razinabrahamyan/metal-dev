<div class="page-wrapper dashboard">
    <div class="sidebar-backdrop"></div>
    @include('elements.profile.profile_sidebar')
    <section class="user-dashboard" id="profile_integrations">
        <div class="dashboard-outer">
            <div class="row">
                @foreach($integrationList as $integration)
                    @if(!empty($integration->template))
                        @include('elements.profile.integrationsElements.'.$integration->template)
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="{{asset('user_assets/js/userIntegrations.min.js')}}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
@endpush
