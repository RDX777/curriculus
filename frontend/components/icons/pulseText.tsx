import { motion } from "framer-motion";

export const PulseText = () => {
  const text = "Aguarde carregando...";
  const letters = text.split("");

  const container = {
    hidden: { opacity: 0 },
    visible: (i = 1) => ({
      opacity: 1,
      transition: { staggerChildren: 0.1, delayChildren: 0.04 * i },
    }),
  };

  // const child = {
  //   hidden: { scale: 1 },
  //   visible: {
  //     scale: [1, 1.2, 1], // Animação de pulso (aumenta e diminui)
  //     transition: {
  //       repeat: Infinity,
  //       repeatType: "loop",
  //       duration: 0.6,
  //       ease: "easeInOut",
  //     },
  //   },
  // };

  const child = {
    hidden: { scale: 1 },
    visible: {
      scale: [1, 1.2, 1], // Animação de pulso (aumenta e diminui)
      transition: {
        repeat: Infinity,
        repeatType: "loop" as const, // Use "as const" para assegurar o tipo correto
        duration: 0.6,
        ease: "easeInOut",
      },
    },
  };


  return (
    <motion.div
      className="flex justify-center items-center space-x-1 text-lg font-bold text-blue-600"
      variants={container}
      initial="hidden"
      animate="visible"
    >
      {letters.map((letter, index) => (
        <motion.span key={index} variants={child}>
          {letter === " " ? "\u00A0" : letter}
        </motion.span>
      ))}
    </motion.div>
  );
};
