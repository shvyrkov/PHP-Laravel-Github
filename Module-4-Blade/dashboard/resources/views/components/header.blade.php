<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
    <div style="background-color: deepskyblue; width: 100%; height: 50px;">
        4.3 Вложенные шаблоны - это Компонент!
    </div>
    <div style="background-color: yellow; width: 100%; height: 70px;">
        Test Component: компонент не изменен шаблоном, где он используется.
    </div>
    <div style="background-color: LightSalmon; width: 100%; height: 180px;">
        <p>Test Component: компонент меняется данными из шаблона, где он используется.</p>
        <h2>Text: {{$text}}</h2>
        <h3>Message: {{$message}}</h3>
        {{$shape}}
    </div>
    {{$line}}
</div>
