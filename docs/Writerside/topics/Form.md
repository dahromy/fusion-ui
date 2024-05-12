# Form

This guide will walk you through the process of building forms using the Symfony form component.

## Installation

1. To integrate the Form component into your project, execute the following command:

    ```bash
    php bin/console fusion-ui:add collapsible
    ```
    
    This command will add the necessary Symfony form template files to your project.

2. Next, include these templates in your Twig form themes:

    ```yaml
    twig:
        form_themes:
          - 'form/ui/form.html.twig'
          - 'form/ui/input.html.twig'
          - 'form/ui/button.html.twig'
          - 'form/ui/checkbox.html.twig'
          - 'form/ui/choice.html.twig'
    ```

## Usage

1. Begin by creating a form class:

    ```php
    <?php

    namespace App\Form;
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\NotBlank;
    
    class ProjectType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('name', TextType::class, [
                'label' => 'Project Name',
                'required' => false,
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3, 'max' => 255]),
                ],
            ]);
        }
    
        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                // Configure your form options here
            ]);
        }
    }
    ```

2. Create a controller to handle the form submission:

    ```php
    <?php

    namespace App\Controller;

    use App\Form\ProjectType;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;

    class ProjectController extends AbstractController
    {
        #[Route('/project/new', name: 'project_new')]
        public function new(Request $request): Response
        {
            $form = $this->createForm(ProjectType::class);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // handle the entities that were created by the form
                $project = $form->getData();

                // ... perform some action, such as saving the task to the database

                return $this->redirectToRoute('project_success');
            }

            return $this->render('project/new.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
    ```

3. Finally, render your form in a Twig template:
    
    ```twig
    {{ form_start(form) }}
         {{ form_row(form.name) }}
    {{ form_end(form) }}
    ```