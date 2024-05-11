<?php

namespace DahRomy\FusionUI\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use Symfonycasts\TailwindBundle\TailwindBuilder;

#[AsCommand(
    name: 'fusion-ui:init',
    description: 'Initialize Fusion UI for your project',
)]
class InitCommand extends Command
{
    public function __construct(private readonly TailwindBuilder $tailwindBuilder)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Task 1: Fetch the config file path and check if it exists
        $io->note('Fetching the config file path...');
        $configFile = $this->tailwindBuilder->getConfigFilePath();

        if (!file_exists($configFile)) {
            $io->error('Tailwind config file not found. Make sure you have installed the TailwindCSS bundle and run "php bin/console tailwind:init" command first.');
            return Command::FAILURE;
        }

        // Task 2: Create the Fusion UI config and write to the config file
        $io->note('Creating the Fusion UI config...');
        $fusionUIConfig = $this->createFusionUIConfig();
        file_put_contents($configFile, $fusionUIConfig);

        // Task 3: Retrieve input CSS path and check if it contains Tailwind CSS
        $io->note('Retrieving the input CSS path...');
        $inputFile = $this->tailwindBuilder->getInputCssPath();
        $contents = is_file($inputFile) ? file_get_contents($inputFile) : '';

        if (!str_contains($contents, '@tailwind base')) {
            $io->error('Tailwind CSS not found in your CSS file. Make sure you have included it in your CSS file.');
            return Command::FAILURE;
        }

        // Task 4: Create Fusion UI directives and append to input CSS file
        $io->note('Creating Fusion UI directives...');
        $fusionUIDirectives = $this->createFusionUIDirectives();
        file_put_contents($inputFile, $fusionUIDirectives);

        // Task 5: Copying font files to the proper directory
        $io->note('Copying fonts folder...');
        $filesystem = new Filesystem();
        $sourceDir = __DIR__ . '/../../assets/fonts';
        $targetDir = dirname($inputFile) . '/fonts';

        try {
            $filesystem->mirror($sourceDir, $targetDir);
        } catch (\Exception $e) {
            $io->error('Failed to copy fonts folder: ' . $e->getMessage());
            return Command::FAILURE;
        }

        // Finalize with success message
        $io->success('Fusion UI initialized successfully.');

        return Command::SUCCESS;
    }

    private function createFusionUIConfig(): string
    {
        return <<<EOF
        const {fontFamily} = require("./assets/vendor/tailwindcss/defaultTheme.js")
        
        /** @type {import('tailwindcss').Config} */
        module.exports = {
            darkMode: ["class"],
            content: [
                "./assets/**/*.js",
                "./templates/**/*.html.twig",
                "./src/**/*.php",
            ],
            theme: {
                container: {
                    center: true,
                    padding: "2rem",
                    screens: {
                        "2xl": "1400px",
                    },
                },
                extend: {
                    colors: {
                        border: "hsl(var(--border))",
                        input: "hsl(var(--input))",
                        ring: "hsl(var(--ring))",
                        background: "hsl(var(--background))",
                        foreground: "hsl(var(--foreground))",
                        primary: {
                            DEFAULT: "hsl(var(--primary))",
                            foreground: "hsl(var(--primary-foreground))",
                        },
                        secondary: {
                            DEFAULT: "hsl(var(--secondary))",
                            foreground: "hsl(var(--secondary-foreground))",
                        },
                        destructive: {
                            DEFAULT: "hsl(var(--destructive))",
                            foreground: "hsl(var(--destructive-foreground))",
                        },
                        muted: {
                            DEFAULT: "hsl(var(--muted))",
                            foreground: "hsl(var(--muted-foreground))",
                        },
                        accent: {
                            DEFAULT: "hsl(var(--accent))",
                            foreground: "hsl(var(--accent-foreground))",
                        },
                        popover: {
                            DEFAULT: "hsl(var(--popover))",
                            foreground: "hsl(var(--popover-foreground))",
                        },
                        card: {
                            DEFAULT: "hsl(var(--card))",
                            foreground: "hsl(var(--card-foreground))",
                        },
                        warning: {
                            DEFAULT: "hsl(var(--warning))",
                            foreground: "hsl(var(--warning-foreground))",
                        },
                        success: {
                            DEFAULT: "hsl(var(--success))",
                            foreground: "hsl(var(--success-foreground))",
                        }
                    },
                    borderRadius: {
                        lg: `var(--radius)`,
                        md: `calc(var(--radius) - 2px)`,
                        sm: "calc(var(--radius) - 4px)",
                    },
                    fontFamily: {
                        sans: ["var(--font-sans)", ...fontFamily.sans],
                        mono: ["var(--font-mono)", ...fontFamily.mono],
                    },
                    keyframes: {
                        "accordion-down": {
                            from: {height: "0"},
                            to: {height: "var(--radix-accordion-content-height)"},
                        },
                        "accordion-up": {
                            from: {height: "var(--radix-accordion-content-height)"},
                            to: {height: "0"},
                        },
                    },
                    animation: {
                        "accordion-down": "accordion-down 0.2s ease-out",
                        "accordion-up": "accordion-up 0.2s ease-out",
                    },
                },
            },
            plugins: [
                require("./assets/vendor/@hyeon/tailwindcss-animate/tailwindcss-animate.index.js"),
            ],
        }
        EOF;
    }

    private function createFusionUIDirectives(): string
    {
        return <<<EOF
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
        
        @font-face {
            font-family: "GeistSans";
            src: url("./fonts/geist-sans/Geist-Variable.woff2") format("woff2");
            font-display: swap;
            font-weight: 100 900
        }
        
        @font-face {
            font-family: "GeistMono";
            src: url("./fonts/geist-mono/GeistMono-Variable.woff2") format("woff2");
            font-display: swap;
            font-weight: 100 900
        }
        
        @layer base {
            :root {
                --font-sans: "GeistSans";
                --font-mono: "GeistMono";
        
                --background: 0 0% 100%;
                --foreground: 0 0% 3.9%;
                --primary: 0 0% 9%;
                --primary-foreground: 0 0% 98%;
                --secondary: 0 0% 96.1%;
                --secondary-foreground: 0 0% 9%;
                --muted: 0 0% 96.1%;
                --muted-foreground: 0 0% 45.1%;
                --accent: 0 0% 96.1%;
                --accent-foreground: 0 0% 9%;
                --destructive: 350 89% 60%;
                --destructive-foreground: 0 0% 100%;
                --warning: 38 92% 50%;
                --warning-foreground: 0 0% 100%;
                --success: 87 100% 37%;
                --success-foreground: 0 0% 100%;
                --border: 0 0% 89.8%;
                --input: 0 0% 89.8%;
                --ring: 0 0% 3.9%;
                --radius: 0.5rem;
                --popover: 0 0% 100%;
                --popover-foreground: 222.2 47.4% 11.2%;
                --card: 0 0% 100%;
                --card-foreground: 222.2 47.4% 11.2%;
            }
        
            .dark {
                --font-sans: "GeistSans";
                --font-mono: "GeistMono";
        
                --background: 0 0% 3.9%;
                --foreground: 0 0% 98%;
                --primary: 0 0% 98%;
                --primary-foreground: 0 0% 9%;
                --secondary: 0 0% 14.9%;
                --secondary-foreground: 0 0% 98%;
                --muted: 0 0% 14.9%;
                --muted-foreground: 0 0% 63.9%;
                --accent: 0 0% 14.9%;
                --accent-foreground: 0 0% 98%;
                --destructive: 350 89% 60%;
                --destructive-foreground: 0 0% 100%;
                --warning: 38 92% 50%;
                --warning-foreground: 0 0% 100%;
                --success: 84 81% 44%;
                --success-foreground: 0 0% 100%;
                --border: 0 0% 14.9%;
                --input: 0 0% 14.9%;
                --ring: 0 0% 83.1%;
                --popover: 224 71% 4%;
                --popover-foreground: 215 20.2% 65.1%;
                --card: 224 71% 4%;
                --card-foreground: 213 31% 91%;
                --radius: 0.5rem;
            }
        }
        
        @layer base {
            * {
                @apply border-border;
            }
        
            body {
                @apply bg-background text-foreground;
                font-feature-settings: "rlig" 1, "calt" 1;
            }
            
            .turbo-progress-bar {
                height: 2px;
                @apply bg-foreground;
            }
        }
        EOF;
    }
}