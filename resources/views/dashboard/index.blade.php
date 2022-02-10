<!DOCTYPE html>
<html lang="fr">
@include('dashboard.partials.head')
<body>
    <div class="body-inner">
        @include('dashboard.partials.topBar')
        @include('dashboard.partials.header')
        @include('dashboard.partials.section')
        @include('dashboard.partials.footer')
        @include('dashboard.modals.index')
    </div>
    @include('dashboard.partials.scripts')
</body>
</html>