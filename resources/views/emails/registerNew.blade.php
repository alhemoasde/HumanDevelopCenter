@component('mail::message')
    <div class="container">
        <br>
        <div class="row text-center">
            <div class="col-md-2">
                <img src="https://laboratorioparaelconocimiento.com/img/arbol.png" width="50%" height="auto"
                    alt="Arbol de raices.">
            </div>
            <div class="col-md-10">
                <h4>Evento Virtual Gratuito</h4>
                <h1 class="display-6"><b>EXPLORANDO LAS RAICES PARA UNA SANACIÓN VERDADERA</b></h1>
            </div>
            <hr class="bg-danger border-8 border-top border-danger" />
        </div>
        <p>¡Abrazo inmenso de <strong style="color: green;"> bienvenida</strong>!</p>
        <p>Empecemos: ¿Qué es <strong style="color: red;"> Sanar </strong> o <strong style="color: red;">Estar Sano?
            </strong></p>
        <div class="text-center">
            <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
                <a href="https://laboratorioparaelconocimiento.com/video-intro/0.Preeventomilena1.mp4" target="_blank"
                    rel="noopener noreferrer">Ver Video No.2</a>
            </div>
        </div>
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-tree-fill"></i> <strong style="color: purple;">Enfermedad</strong>,
                la palabra que ha tomado poder.</li>
            <li class="list-group-item"><i class="bi bi-tree-fill"></i> <strong style="color: purple;">Enfermos</strong>,
                sin cura: por herencia, por estrés, porque sí.</li>
            <li class="list-group-item"><i class="bi bi-tree-fill"></i> <strong style="color: purple;">Enfermarse</strong>,
                como normal, vino y se quedó.</li>
        </ul>
        <br>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                Es momento de revaluar tu <strong style="color:red;">Salud</strong>; de dar importancia a lo que sí debes y
                puedes.
            </li>
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                Es momento de asumir la responsabilidad en tu <strong style="color:red;">autocuidado</strong>.
            </li>
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                Es momento de entender que No eres igual a otro, así como tus dolencias o patologías.
            </li>
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                No eres una fórmula química; por lo que debes darte la atención necesaria y <strong
                    style="color:red;">cambiar</strong> tus niveles de <strong style="color:red;">conciencia</strong>; para
                regalarte una vida plena, tranquila y feliz.
            </li>
            <br>
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                Entra al vídeo y empieza a <strong style="color:red;">observarte</strong>.
            </li>
            <li class="list-group-item"><i class="bi bi-bandaid-fill"></i>
                Prepárate para que este gran evento virtual, que te llevará en un recorrido de <strong style="color:red;">lo
                    que Eres</strong>, desde tus raíces, hasta tus frutos.
            </li>
        </ul>
        <br>
        <div class="alert alert-success" role="alert">
            Si conoces a alguien que pueda interesarse en este evento, comparte esta pagina.
            <a href="https://laboratorioparaelconocimiento.com/subscriber-create" target="_blank"
                rel="noopener noreferrer">Inscripción Gratuita al Evento</a>
        </div>
        <p>
            Agradecimiento especial a: <strong> LABORATORIO PARA EL CONOCIMIENTO </strong>, por el montaje de este Evento
            Virtual... <br> Correo electrónico: <a
                href="mailto:info@laboratorioparaelconocimiento.com">info@laboratorioparaelconocimiento.com</a>
        </p>
    </div>
    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
