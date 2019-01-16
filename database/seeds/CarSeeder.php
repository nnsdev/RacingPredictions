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
            [5, 'Mustang Sampling Racing', 'Cadillac DPi', 'dpi', ['Joao Barbosa', 'Mike Conway', 'Filipe Alboquerque, Christian Fittipaldi']],
            [6, 'Acura Team Penske', 'Acura DPi', 'dpi', ['Juan Pablo Montoya', 'Dane Cameron', 'Simon Pagenaud']],
            [7, 'Acura Team Penske', 'Acura DPi', 'dpi', ['Helio Castroneves', 'Ricky Taylor', 'Alexander Rossi']],
            [10, 'Konica Minolta Cadillac DPi-V.R.', 'Cadillac DPi', 'dpi', ['Renger Van Der Zande', 'Jordan Taylor', 'Fernando Alonso', 'Kamui Kobayashi']],
            [31, 'Whelen Engineering Racing', 'Cadillac DPi', 'dpi', ['Felipe Nasr', 'Pipo Derani', 'Eric Curra']],
            [50, 'Juncos Racing', 'Cadillac DPi', 'dpi', ['Will Owen', 'Rene Binder', 'Agustin Canapino', 'Kyle Kaiser']],
            [54, 'CORE autosport', 'Nissan DPi', 'dpi', ['Jonathan Bennett', 'Colin Braun', 'Romain Dumais', 'Loic Duval']],
            [55, 'Mazda Team Joest', 'Mazda DPi', 'dpi', ['Jonathan Bomarito', 'Harry Tincknell', 'Olivier Pla']],
            [77, 'Mazda Team Joest', 'Mazda DPi', 'dpi', ['Oliver Jarvis', 'Tristan Nunez', 'Timo Bernhard', 'Rene Rast']],
            [84, 'JDC-Miller Motorsport', 'Cadillac DPi', 'dpi', ['Simon Trummer', 'Stephen Simpson', 'Chris Miller', 'Juan Piedrahita']],
            [85, 'JDC-Miller Motorsport', 'Cadillac DPi', 'dpi', ['Misha Goikhberg', 'Tristan Vautier', 'Devlin DeFrancesco', 'Rubens Barrichello']],
            [18, 'DragonSpeed', 'ORECA LMP2', 'lmp2', ['Roberto Gonzales', 'Pastor Maldonado', 'Sebastian Saavedra', 'Ryan Cullen']],
            [38, 'Performance Tech Motorsports', 'ORECA LMP2', 'lmp2', ['Kyle Masson', 'Kris Wright', 'Cameron Cassels', 'Robert Masson']],
            [52, 'PR1 Mathiasen Motorsports', 'ORECA LMP2', 'lmp2', ['Matthew McMurry', 'Gabriel Aubry', 'Mark Kvamme', 'Kris Wright']],
            [81, 'DragonSpeed', 'ORECA LMP2', 'lmp2', ['Henrik Hedman', 'Ben Hanley', 'Nicolas Lapierre', 'James Allen']],
            [3, 'Corvette Racing', 'Corvette C7.R', 'gtelm', ['Jan Magnussen', 'Antonio Garcia', 'Mike Rockenfeller']],
            [4, 'Corvette Racing', 'Corvette C7.R', 'gtelm', ['Oliver Garvin', 'Tommy Milner', 'Marcel Fassler']],
            [24, 'BMW Team RLL', 'BMW M8 GTE', 'gtelm', ['Jesse Krohn', 'John Edwards', 'Mozzie Mostert', 'Alex Zanardi']],
            [25, 'BMW Team RLL', 'BMW M8 GTE', 'gtelm', ['Tom Blomqvist', 'Connor De Phillippi', 'Philipp Eng', 'Colton Herta']],
            [62, 'Risi Competizione', 'Ferrari 488 GTE', 'gtelm', ['Davide Rigon', 'Miguel Molina', 'Alessandro Pier Guidi', 'James Calado']],
            [66, 'Ford Chip Ganassi Racing', 'Ford GT', 'gtelm', ['Joey Hand', 'Dirk Muller', 'Sebastien Bourdais']],
            [67, 'Ford Chip Ganassi Racing', 'Ford GT', 'gtelm', ['Ryan Briscoe', 'Richard Westbrook', 'Scott Dixon']],
            [911, 'Porsche GT Team', 'Porsche 911 RSR', 'gtelm', ['Patrick Pilet', 'Nick Tandy', 'Frederic Makowiecki']],
            [912, 'Porsche GT Team', 'Porsche 911 RSR', 'gtelm', ['Mathieu Jaminet', 'Earl Bamber', 'Laurens Vanthoor']],
            [8, 'Starworks Motorsport', 'Audi R8 LMS GT3', 'gtd', ['Parker Chase', 'Ryan Dalziel', 'Ezequiel Perez Companc', 'Chris Haase']],
            [9, 'PFAFF Motorsport', 'Porsche 911 GT3R', 'gtd', ['Scott Hargrove', 'Zacharie Robichon', 'Lars Kern', 'Dennis Olson']],
            [11, 'GRT Grasser Racing Team', 'Lamborghini Huracan GT3', 'gtd', ['Rolf Ineichen', 'Mirko Bortolotti', 'Christian Engelhart', 'Kang Ling']],
            [12, 'AIM Vasser Sullivan', 'Lexus RC F GT3', 'gtd', ['Frank  Montecalvo', 'Townsend Bell', 'Aaron Telitz', 'Jeff Segal']],
            [13, 'Via Italian Racing', 'Ferrari 488 GT3', 'gtd', ['Chico Longo', 'Victor Franzoni', 'Marcos Gomes']],
            [14, 'AIM Vasser Sullivan', 'Lexus RC F GT3', 'gtd', ['Richard Heistand', 'Jack Hawksworth', 'Austin Cindric', 'Nick Cassidy']],
            [19, 'Moorespeed', 'Audi R8 LMS GT3', 'gtd', ['Will Hardeman', 'Alex Riberas', 'Andrew Davis', 'Markus Winkelhock']],
            [29, 'Montaplast by Land Motorsport', 'Audi R8 LMS GT3', 'gtd', ['Daniel Morad', 'Christopher Mies', 'TBD', 'Dries Vanthoor']],
            [33, 'Mercedes-AMG Team Riley Motorsports', 'Mercedes-AMG GT3', 'gtd', ['Ben Keating', 'Jeroen Bleekemolen', 'Luca Stolz', 'Felipe Fraga']],
            [44, 'Magnus Racing', 'Lamborghini Huracan GT3', 'gtd', ['John Potter', 'Andy Lally', 'Spencer Pumpelly', 'Marco Mapelli']],
            [46, 'EBIMOTORS', 'Lamborghini Huracan GT3', 'gtd', ['Emanuele Busnelli', 'Fabio Babini', 'TBD']],
            [47, 'Precision Performance Motorsports (PPM)', 'Lamborghini Huracan GT3', 'gtd', ['Steve Dunn', 'Brandon Gdovic', 'Linus Lundqvist', 'Milos Pavlovic', 'Don Yount']],
            [48, 'Paul Miller Racing', 'Lamborghini Huracan GT3', 'gtd', ['Bryan Sellers', 'Ryan Hardwick', 'Corey Lewis', 'Andrea Caldarelli']],
            [51, 'Spirit of Race', 'Ferrari 488 GT3', 'gtd', ['Paul Dalla Lana', 'Pedro Lamy', 'Mathias Lauda', 'Daniel Serra']],
            [57, 'Meyer Shank Racing w/ Curb-Agajanian', '', 'gtd', ['Jackie Heinricher', 'Katherine Legge', 'Ana Beatriz', 'Simona De Silvestro', 'Christina Nielsen']],
            [63, 'Scuderia Corsa', 'Ferrari 488 GT3', 'gtd', ['Cooper MacNeil', 'Toni Vilander', 'Jeff Westphal', 'Dominik Farnbacher']],
            [71, 'P1 Motorsports', 'Mercedes-AMG GT3', 'gtd', ['Maximillian Bukh', 'Fabian Schiller', 'Dominik Baumann', 'JC Perez']],
            [73, 'Park Place Motorsports', 'Porsche 911 GT3 R', 'gtd', ['Patrick Lindsey', 'Patrick Long', 'Matt Campbell', 'Nicholas Boulle']],
            [86, 'Meyer Shank Racing w/ Curb-Agajanian', 'Acura NSX GT3', 'gtd', ['Mario  Farnbacher', 'Trent Hindman', 'Justin Marks', 'AJ Allmendinger']],
            [88, 'WRT Speedstar Audi Sport', 'Audi R8 LMS GT3', 'gtd', ['Frederic Vervisch', 'Kelvin van der Linde', 'Ian James', 'Roman DeAngelis']],
            [96, 'Turner Motorsport', 'BMW M6 GT3', 'gtd', ['Bill Auberlen', 'Robby Forley', 'Dillon Machavern', 'Jens Klingmann']],
            [99, 'NGT Motorsport', 'Porsche 911 GT3 R', 'gtd', ['Juergen Haering', 'Steffen Goerig', 'Sven Muller', 'Klaus Bachler', 'Alfred Renauer']],
            [540, 'Black Swan Racing', 'Porsche 911 GT3 R', 'gtd', ['Timothy Pappas', 'Marco Seefried', 'Matteo Cairoli', 'Dirk Werner']],
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
