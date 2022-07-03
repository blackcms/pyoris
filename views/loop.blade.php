@include(Theme::getThemeNamespace() . '::views.templates.posts', array('posts' => $properties))
@include(Theme::getThemeNamespace() . '::views.templates.properties', compact('properties'))
