"use client";
import { useState, useEffect } from "react";
import { motion } from "framer-motion";
import MenuIcons from "./menuIcons";
import { useWebsocket } from "@/contexts/websocket";

export const HellsBellsIcon = () => {
  const { notificationMessages, countMessages } = useWebsocket();

  const [messagesQuantity, setMessagesQuantity] = useState(0);
  const [isAnimating, setIsAnimating] = useState(false);

  useEffect(() => {
    setMessagesQuantity(countMessages(false));
    startAnimation();
  }, [notificationMessages, countMessages]);

  const startAnimation = () => {
    setIsAnimating(true);
  };

  return (
    <div className="relative">
      <motion.div
        animate={isAnimating ? { rotate: [0, -10, 10, -10, 10, -10, 0] } : {}}
        transition={{
          duration: 0.5,
          loop: Infinity,
        }}
        onAnimationComplete={() => setIsAnimating(false)}
      >
        <MenuIcons
          name="IoMdNotificationsOutline"
          className="w-10 h-10 mx-1 mt-1 text-cyan-600 text-opacity-95 transition-icons"
        />
      </motion.div>
      <span className="absolute mt-2 top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 dark:bg-slate-400 rounded-full">
        {messagesQuantity < 99 ? messagesQuantity : "99+"}
      </span>
    </div>
  );
};
