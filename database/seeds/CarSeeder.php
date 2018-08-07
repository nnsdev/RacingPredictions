<?php

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [1, 'Rebellion Racing', 'Rebellion R13 - Gibson', 'lmp1', ['André Lotterer', 'Neel Jani', 'Bruno Senna']],
            [3, 'Rebellion Racing', 'Rebellion R13 - Gibson', 'lmp1', ['Thomas Laurent', 'Mathias Beche', 'Gustavo Menezes']],
            [4, 'Bykolles Racing Team', 'Enso CLM P1/01 - Nismo', 'lmp1', ['Oliver Webb', 'Dominik Kraihamer', 'Tom Dillmann']],
            [5, 'CEFC TRSM Racing', 'Ginetta G60-LT-P1 - Mechachrome', 'lmp1', ['Charlie Robertson', 'Michael Simpson', 'Léo Roussel']],
            [6, 'CEFC TRSM Racing', 'Ginetta G60-LT-P1 - Mechachrome', 'lmp1', ['Oliver Rowland', 'Alex Brundle', 'Oliver Turvey']],
            [7, 'Toyota Gazoo Racing', 'Toyota TS050 - Hybrid', 'lmp1', ['Mike Conway', 'Kamui Kobayashi', 'Jose Maria Lopez']],
            [8, 'Toyota Gazoo Racing', 'Toyota TS050 - Hybrid', 'lmp1', ['Sébastien Buemi', 'Kazuki Nakajima', 'Fernando Alonso']],
            [10, 'Dragonspeed', 'BR Engineering BR1 - Gibson', 'lmp1', ['Henrik Hedman', 'Ben Hanley', 'Renger van der Zande']],
            [11, 'SMP Racing', 'BR Engineering BR1 - AER', 'lmp1', ['Vitaly Petrov', 'Mikhail Aleshin', 'Jenson Button']],
            [17, 'SMP Racing', 'BR Engineering BR1 - AER', 'lmp1', ['Stéphane Sarrazin', 'Egor Orudzhev', 'Matevos Isaakyan']],
            [22, 'United Autosport', 'Ligier JSP217 - Gibson', 'lmp2', ['Phil Hanson', 'Filipe Albuquerque', 'Paul Di Resta']],
            [23, 'Panis Barthez Competition', 'Ligier JSP217 - Gibson', 'lmp2', ['Timothé Buret', 'Julien Canal', 'Will Stevens']],
            [25, 'Algarve Pro Racing', 'Ligier JSP217 - Gibson', 'lmp2', ['Mark Patterson', 'Ate De Jong', 'Tacksung Kim']],
            [26, 'G-Drive Racing', 'Oreca 07 - Gibson', 'lmp2', ['Roman Rusinov', 'Andrea Pizzitola', 'Jean-Eric Vergne']],
            [28, 'TDS Racing', 'Oreca 07 - Gibson', 'lmp2', ['François Perrodo', 'Matthieu Vaxiviere', 'Loïc Duval']],
            [29, 'Racing Team Nederland', 'Dallara P217 - Gibson', 'lmp2', ['Frits van Eerd', 'Giedo van der Garde', 'Jan Lammers']],
            [31, 'Dragonspeed', 'Oreca 07 - Gibson', 'lmp2', ['Roberto Gonzalez', 'Pastor Maldonado', 'Nathanaël Berthon']],
            [32, 'United Autosport', 'Ligier JSP217 - Gibson', 'lmp2', ['Hugo de Sadeleer', 'Will Owen', 'Juan Pablo Montoya']],
            [33, 'Jackie Chan DC Racing', 'Ligier JSP217 - Gibson', 'lmp2', ['David Cheng', 'Nicholas Boulle', 'Pierre Nicolet']],
            [34, 'Jackie Chan DC Racing', 'Ligier JSP217 - Gibson', 'lmp2', ['Ricky Taylor', 'Côme Ledogar', 'David Heinemeier-Hansson']],
            [35, 'SMP Racing', 'Dallara P217 - Gibson', 'lmp2', ['Victor Shaitar', 'Harrison Newey', 'Norman Nato']],
            [36, 'Signatech Aline Matmut', 'Alpine A470 - Gibson', 'lmp2', ['Nicolas Lapierre', 'Andre Negrao', 'Phierre Thiriet']],
            [37, 'Jackie Chan DC Racing (JOTA)', 'Oreca 07 - Gibson', 'lmp2', ['Jazeman Jaafar', 'Nabril Jeffri', 'Weiron Tan']],
            [38, 'Jackie Chan DC Racing (JOTA)', 'Oreca 07 - Gibson', 'lmp2', ['Ho Pin Tung', 'Stéphane Richelmi', 'Gabriel Aubry']],
            [39, 'Graff-SO24', 'Oreca 07 - Gibson', 'lmp2', ['Vincent Capillaire', 'Jonathan Hirschi', 'Tristan Gommendy']],
            [40, 'G-Drive Racing', 'Oreca 07 - Gibson', 'lmp2', ['James Allen', 'Jose Gutierrez', 'Enzo Guibbert']],
            [44, 'Eurasia Motorsport', 'Ligier JSP217 - Gibson', 'lmp2', ['Andrea Bertolini', 'Nic Jönsson', 'Tracy Krohn']],
            [47, 'Cetilar Villora Corse', 'Dallara P217 - Gibson', 'lmp2', ['Roberto Lacorte', 'Giorgio Sernagiotto', 'Felipe Nasr']],
            [48, 'IDEC Sport', 'Oreca 07 - Gibson', 'lmp2', ['Paul Lafargue', 'Paul-Loup Chatin', 'Meme Rojas']],
            [50, 'Larbe Competition', 'Ligier JSP217 - Gibson', 'lmp2', ['Erwin Creed', 'Romano Ricci', 'Thomas Dagoneau']],
            [51, 'AF Corse', 'Ferrari 488 GTE EVO', 'gtepro', ['Alessandro Pier Guidi', 'James Calado', 'Daniel Serra']],
            [52, 'AF Corse', 'Ferrari 488 GTE EVO', 'gtepro', ['Toni Vilander', 'Antonio Givinazzi', 'Luis Felipe Derani']],
            [63, 'Corvette Racing', 'Chevrolet Corvette C7.R', 'gtepro', ['Jan Magnussen', 'Antonio Garcia', 'Mike Rockenfeller']],
            [64, 'Corvette Racing', 'Chevrolet Corvette C7.R', 'gtepro', ['Oliver Gavin', 'Tommy Milner', 'Marcel Fässler']],
            [66, 'Ford Chip Ganassi Team UK', 'Ford GT', 'gtepro', ['Stefan Mücke', 'Olivier Pla', 'Billy Johnson']],
            [67, 'Ford Chip Ganassi Team UK', 'Ford GT', 'gtepro', ['Andy Priaulx', 'Harry Tincknell', 'Tony Kanaan']],
            [68, 'Ford Chip Ganassi Team USA', 'Ford GT', 'gtepro', ['Joey Hand', 'Dirk Müller', 'Sébastien Bourdais']],
            [69, 'Ford Chip Ganassi Team USA', 'Ford GT', 'gtepro', ['Ryan Briscoe', 'Richard Westbrook', 'Scott Dixon']],
            [71, 'AF Corse', 'Ferrari 488 GTE EVO', 'gtepro', ['Davide Rigon', 'Sam Bird', 'Miguel Molina']],
            [81, 'BMW Team MTek', 'BMW M8 GTE', 'gtepro', ['Martin Tomczyk', 'Nicky Catsburg', 'Philipp Eng']],
            [82, 'BMW Team MTek', 'BMW M8 GTE', 'gtepro', ['Augusto Farfus', 'Antonio Felix Da Costa', 'Alexander Sims']],
            [91, 'Porsche GT Team', 'Porsche 911 RSR', 'gtepro', ['Richard Lietz', 'Gianmaria Bruni', 'Frédéric Makowiecki']],
            [92, 'Porsche GT Team', 'Porsche 911 RSR', 'gtepro', ['Michael Christensen', 'Kevin Estre', 'Laurens Vanthoor']],
            [93, 'Porsche GT Team (USA)', 'Porsche 911 RSR', 'gtepro', ['Patrick Pilet', 'Nick Tandy', 'Earl Bamber']],
            [94, 'Porsche GT Team (USA)', 'Porsche 911 RSR', 'gtepro', ['Romain Dumas', 'Timo Bernhard', 'Sven Müller']],
            [95, 'Aston Martin Racing', 'Aston Martin Vantage AMR', 'gtepro', ['Marco Sørensen', 'Nicki Thiim', 'Darren Turner']],
            [97, 'Aston Martin Racing', 'Aston Martin Vantage AMR', 'gtepro', ['Alex Lynn', 'Maxime Martin', 'Jonny Adam']],
            [54, 'Spirit of Race (AF Corse)', 'Ferrari 488 GTE EVO', 'gteam', ['Thomas Flohr', 'Francesco Castellacci', 'Giancarlo Fisichella']],
            [56, 'Team Project 1', 'Porsche 911 RSR', 'gteam', ['Jörg Bergmeister', 'Patrick Lindsey', 'Egidio Perfetti']],
            [61, 'Clearwater Racing', 'Ferrari 488 GTE EVO', 'gteam', ['Weng Sun Mok', 'Matt Griffin', 'Keita Sawa']],
            [70, 'MR Racing (AF Corse)', 'Ferrari 488 GTE EVO', 'gteam', ['Motoaka Ishikawa', 'Olivier Beretta', 'Eddie Cheever III']],
            [77, 'Dempsey-Proton Racing', 'Porsche 911 RSR', 'gteam', ['Matt Campbell', 'Christian Ried', 'Julian Andlauer']],
            [80, 'Ebimotors', 'Porsche 911 RSR', 'gteam', ['Fabio Babini', 'Christina Nielsen', 'Erik Maris']],
            [84, 'JMW Motorsport', 'Ferrari 488 GTE EVO', 'gteam', ['Liam Griffin', 'Cooper MacNeil', 'Jeff Segal']],
            [85, 'Keating Motorsport (Risi)', 'Ferrari 488 GTE EVO', 'gteam', ['Ben Keating', 'Jeroen Beekemolen', 'Luca Stolz']],
            [86, 'Gulf Racing', 'Porsche 911 RSR', 'gteam', ['Mike Wainwright', 'Ben Barker', 'Alex Davison']],
            [88, 'Dempsey-Proton Racing', 'Porsche 911 RSR', 'gteam', ['Matteo Cairoli', 'Khaled Al Qubaisi', 'Giorgio Roda']],
            [90, 'TF Sport', 'Aston Martin Vantage AMR', 'gteam', ['Salih Yoluc', 'Euan Hankey', 'Charlie Eastwood']],
            [98, 'Aston Martin Racing', 'Aston Martin Vantage AMR', 'gteam', ['Paul Dalla Lana', 'Pedro Lamy', 'Mathias Lauda']],
            [99, 'Proton Competition', 'Porsche 911 RSR', 'gteam', ['Patrick Long', 'Tim Pappas', 'Spencer Pumpelly']],
        ])->each(function ($car) {
            \App\Models\Car::firstOrCreate([
                'car_number' => $car[0],
                'name' => $car[1],
                'car' => $car[2],
                'class' => $car[3],
                'drivers' => json_encode($car[4]),
            ]);
        });
    }
}
