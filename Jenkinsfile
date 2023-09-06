pipeline {
    agent any
    stages {
        stage("Build php webapp") {
            steps {
                bat 'docker build -t php-webserver .'
                bat 'docker images'
                bat 'docker ps'
                bat 'ls -ltr'
            }
        }
        stage("Delivery of Image to Docker Hub") {
            steps {
               withCredentials([usernamePassword(
                    credentialsId: "docker_cred",
                    passwordVariable: "dockerhubPass",
                    usernameVariable: "dockerhubUser"
                )]) {
                    bat "docker login -u ${env.dockerhubUser} -p ${env.dockerhubPass}"
                }   
                bat 'docker ps' 
                bat 'docker tag phpwebserver:latest budhaujjwal/php-webserver:v9'
                bat 'docker push budhaujjwal/php-webserver:v9' 
            }
        }
        // stage("deploying on kubernetes") {
        //     steps {
        //         bat 'ssh ujjwal@172.25.21.114 "kubectl get pods"'
                
                
                
        //     }
        }
        
        
    }
}
