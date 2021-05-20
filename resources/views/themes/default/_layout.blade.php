<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        .embed-responsive-item {
            width: 100%;
            height: 350px;
        }

        .prose {
            color: #374151;
            max-width: 65ch;
        }

        .prose [class~="lead"] {
            color: #4b5563;
            font-size: 1.25em;
            line-height: 1.6;
            margin-top: 1.2em;
            margin-bottom: 1.2em;
        }

        .prose a {
            color: #111827;
            text-decoration: underline;
            font-weight: 500;
        }

        .prose strong {
            color: #111827;
            font-weight: 600;
        }

        .prose ol[type="A"] {
            --list-counter-style: upper-alpha;
        }

        .prose ol[type="a"] {
            --list-counter-style: lower-alpha;
        }

        .prose ol[type="I"] {
            --list-counter-style: upper-roman;
        }

        .prose ol[type="i"] {
            --list-counter-style: lower-roman;
        }

        .prose ol[type="1"] {
            --list-counter-style: decimal;
        }

        .prose ol>li {
            position: relative;
            padding-left: 1.75em;
        }

        .prose ol>li::before {
            content: counter(list-item, var(--list-counter-style, decimal)) ".";
            position: absolute;
            font-weight: 400;
            color: #6b7280;
            left: 0;
        }

        .prose ul>li {
            position: relative;
            padding-left: 1.75em;
        }

        .prose ul>li::before {
            content: "";
            position: absolute;
            background-color: #d1d5db;
            border-radius: 50%;
            width: 0.375em;
            height: 0.375em;
            top: calc(0.875em - 0.1875em);
            left: 0.25em;
        }

        .prose hr {
            border-color: #e5e7eb;
            border-top-width: 1px;
            margin-top: 3em;
            margin-bottom: 3em;
        }

        .prose blockquote {
            font-weight: 500;
            font-style: italic;
            color: #111827;
            border-left-width: 0.25rem;
            border-left-color: #e5e7eb;
            quotes: "\201C""\201D""\2018""\2019";
            margin-top: 1.6em;
            margin-bottom: 1.6em;
            padding-left: 1em;
        }

        .prose blockquote p:first-of-type::before {
            content: open-quote;
        }

        .prose blockquote p:last-of-type::after {
            content: close-quote;
        }

        .prose h1 {
            color: #111827;
            font-weight: 800;
            font-size: 2.25em;
            margin-top: 0;
            margin-bottom: 0.8888889em;
            line-height: 1.1111111;
        }

        .prose h2 {
            color: #111827;
            font-weight: 700;
            font-size: 1.5em;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.3333333;
        }

        .prose h3 {
            color: #111827;
            font-weight: 600;
            font-size: 1.25em;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.6;
        }

        .prose h4 {
            color: #111827;
            font-weight: 600;
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            line-height: 1.5;
        }

        .prose figure figcaption {
            color: #6b7280;
            font-size: 0.875em;
            line-height: 1.4285714;
            margin-top: 0.8571429em;
        }

        .prose code {
            color: #111827;
            font-weight: 600;
            font-size: 0.875em;
        }

        .prose code::before {
            content: "`";
        }

        .prose code::after {
            content: "`";
        }

        .prose a code {
            color: #111827;
        }

        .prose pre {
            color: #e5e7eb;
            background-color: #1f2937;
            overflow-x: auto;
            font-size: 0.875em;
            line-height: 1.7142857;
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
            border-radius: 0.375rem;
            padding-top: 0.8571429em;
            padding-right: 1.1428571em;
            padding-bottom: 0.8571429em;
            padding-left: 1.1428571em;
        }

        .prose pre code {
            background-color: transparent;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-weight: 400;
            color: inherit;
            font-size: inherit;
            font-family: inherit;
            line-height: inherit;
        }

        .prose pre code::before {
            content: none;
        }

        .prose pre code::after {
            content: none;
        }

        .prose table {
            width: 100%;
            table-layout: auto;
            text-align: left;
            margin-top: 2em;
            margin-bottom: 2em;
            font-size: 0.875em;
            line-height: 1.7142857;
        }

        .prose thead {
            color: #111827;
            font-weight: 600;
            border-bottom-width: 1px;
            border-bottom-color: #d1d5db;
        }

        .prose thead th {
            vertical-align: bottom;
            padding-right: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-left: 0.5714286em;
        }

        .prose tbody tr {
            border-bottom-width: 1px;
            border-bottom-color: #e5e7eb;
        }

        .prose tbody tr:last-child {
            border-bottom-width: 0;
        }

        .prose tbody td {
            vertical-align: top;
            padding-top: 0.5714286em;
            padding-right: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-left: 0.5714286em;
        }

        .prose {
            font-size: 1rem;
            line-height: 1.75;
        }

        .prose p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose img {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose video {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose figure {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose figure>* {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose h2 code {
            font-size: 0.875em;
        }

        .prose h3 code {
            font-size: 0.9em;
        }

        .prose ol {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose ul {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose li {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .prose>ul>li p {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose>ul>li>*:first-child {
            margin-top: 1.25em;
        }

        .prose>ul>li>*:last-child {
            margin-bottom: 1.25em;
        }

        .prose>ol>li>*:first-child {
            margin-top: 1.25em;
        }

        .prose>ol>li>*:last-child {
            margin-bottom: 1.25em;
        }

        .prose ul ul,
        .prose ul ol,
        .prose ol ul,
        .prose ol ol {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose hr+* {
            margin-top: 0;
        }

        .prose h2+* {
            margin-top: 0;
        }

        .prose h3+* {
            margin-top: 0;
        }

        .prose h4+* {
            margin-top: 0;
        }

        .prose thead th:first-child {
            padding-left: 0;
        }

        .prose thead th:last-child {
            padding-right: 0;
        }

        .prose tbody td:first-child {
            padding-left: 0;
        }

        .prose tbody td:last-child {
            padding-right: 0;
        }

        .prose> :first-child {
            margin-top: 0;
        }

        .prose> :last-child {
            margin-bottom: 0;
        }

        .prose-sm {
            font-size: 0.875rem;
            line-height: 1.7142857;
        }

        .prose-sm p {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
        }

        .prose-sm [class~="lead"] {
            font-size: 1.2857143em;
            line-height: 1.5555556;
            margin-top: 0.8888889em;
            margin-bottom: 0.8888889em;
        }

        .prose-sm blockquote {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
            padding-left: 1.1111111em;
        }

        .prose-sm h1 {
            font-size: 2.1428571em;
            margin-top: 0;
            margin-bottom: 0.8em;
            line-height: 1.2;
        }

        .prose-sm h2 {
            font-size: 1.4285714em;
            margin-top: 1.6em;
            margin-bottom: 0.8em;
            line-height: 1.4;
        }

        .prose-sm h3 {
            font-size: 1.2857143em;
            margin-top: 1.5555556em;
            margin-bottom: 0.4444444em;
            line-height: 1.5555556;
        }

        .prose-sm h4 {
            margin-top: 1.4285714em;
            margin-bottom: 0.5714286em;
            line-height: 1.4285714;
        }

        .prose-sm img {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm video {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm figure {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm figure>* {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-sm figure figcaption {
            font-size: 0.8571429em;
            line-height: 1.3333333;
            margin-top: 0.6666667em;
        }

        .prose-sm code {
            font-size: 0.8571429em;
        }

        .prose-sm h2 code {
            font-size: 0.9em;
        }

        .prose-sm h3 code {
            font-size: 0.8888889em;
        }

        .prose-sm pre {
            font-size: 0.8571429em;
            line-height: 1.6666667;
            margin-top: 1.6666667em;
            margin-bottom: 1.6666667em;
            border-radius: 0.25rem;
            padding-top: 0.6666667em;
            padding-right: 1em;
            padding-bottom: 0.6666667em;
            padding-left: 1em;
        }

        .prose-sm ol {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
        }

        .prose-sm ul {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
        }

        .prose-sm li {
            margin-top: 0.2857143em;
            margin-bottom: 0.2857143em;
        }

        .prose-sm ol>li {
            padding-left: 1.5714286em;
        }

        .prose-sm ol>li::before {
            left: 0;
        }

        .prose-sm ul>li {
            padding-left: 1.5714286em;
        }

        .prose-sm ul>li::before {
            height: 0.3571429em;
            width: 0.3571429em;
            top: calc(0.8571429em - 0.1785714em);
            left: 0.2142857em;
        }

        .prose-sm>ul>li p {
            margin-top: 0.5714286em;
            margin-bottom: 0.5714286em;
        }

        .prose-sm>ul>li>*:first-child {
            margin-top: 1.1428571em;
        }

        .prose-sm>ul>li>*:last-child {
            margin-bottom: 1.1428571em;
        }

        .prose-sm>ol>li>*:first-child {
            margin-top: 1.1428571em;
        }

        .prose-sm>ol>li>*:last-child {
            margin-bottom: 1.1428571em;
        }

        .prose-sm ul ul,
        .prose-sm ul ol,
        .prose-sm ol ul,
        .prose-sm ol ol {
            margin-top: 0.5714286em;
            margin-bottom: 0.5714286em;
        }

        .prose-sm hr {
            margin-top: 2.8571429em;
            margin-bottom: 2.8571429em;
        }

        .prose-sm hr+* {
            margin-top: 0;
        }

        .prose-sm h2+* {
            margin-top: 0;
        }

        .prose-sm h3+* {
            margin-top: 0;
        }

        .prose-sm h4+* {
            margin-top: 0;
        }

        .prose-sm table {
            font-size: 0.8571429em;
            line-height: 1.5;
        }

        .prose-sm thead th {
            padding-right: 1em;
            padding-bottom: 0.6666667em;
            padding-left: 1em;
        }

        .prose-sm thead th:first-child {
            padding-left: 0;
        }

        .prose-sm thead th:last-child {
            padding-right: 0;
        }

        .prose-sm tbody td {
            padding-top: 0.6666667em;
            padding-right: 1em;
            padding-bottom: 0.6666667em;
            padding-left: 1em;
        }

        .prose-sm tbody td:first-child {
            padding-left: 0;
        }

        .prose-sm tbody td:last-child {
            padding-right: 0;
        }

        .prose-sm> :first-child {
            margin-top: 0;
        }

        .prose-sm> :last-child {
            margin-bottom: 0;
        }
        }
    </style>
</head>

<body>
    @yield('content')
    <footer class="mb-4">
        <div class="flex justify-center">
            <p class="mb-8 text-sm text-center text-gray-700 md:text-left md:mb-0" style="font-family: Poppins;">Powered
                by <a href="https://write.mv"><span class="font-semibold" style="color:#2F71F0;">Write.mv</span></a></p>

        </div>
    </footer>
</body>

</html>